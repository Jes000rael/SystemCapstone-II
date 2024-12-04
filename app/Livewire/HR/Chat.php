<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Message;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class Chat extends Component
{

     
        public $employee_id;
        public $chatmessage='';
        public $messages;
        public $first_name;
        public $last_name;
        public $status;
    
        protected $rules = [
            'useremployee_id' => 'required',
            'chatmessage' => 'required',
        ];
                 

        
            public function mount($empID)
            {
                
                try {
               
                    $decryptedempID = Crypt::decrypt($empID);

                    $this->messages = Message::where(function ($query) use ($decryptedempID) {
                        $query->where('useremployee_id', $decryptedempID)
                              ->where('employee_id', Auth::user()->employee_id);
                    })->orWhere(function ($query) use ($decryptedempID) {
                        $query->where('useremployee_id', Auth::user()->employee_id)
                              ->where('employee_id', $decryptedempID);
                    })
                    ->latest()
                    ->take(50)
                    ->get()
                    ->reverse();

                    $emp = EmployeeRecords::findOrFail($decryptedempID);
                    $this->employee_id = $emp->employee_id;
                    $this->first_name = $emp->first_name;
                    $this->last_name = $emp->last_name;
                    $this->status = $emp->status;
                    
                    $this->dispatch('scroll-chat-to-bottom');


                } catch (DecryptException $e) {
                 
                    session()->flash('error', 'Invalid or corrupted contact ID.');
                } catch (ModelNotFoundException $e) {
                
                    session()->flash('error', 'Contact not found.');
                } catch (\Exception $e) {
                  
                    session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
                }
            
               
            }
        


            
        public function sendMessage()
        {
          
           
            Message::create([
                'employee_id' => Auth::user()->employee_id,
                'company_id' => Auth::user()->company_id,
                'chatmessage' => $this->chatmessage,
                'useremployee_id' => $this->employee_id,
            ]);
           

            $this->chatmessage = '';
            $this->dispatch('refreshPage');

            $this->dispatch('scroll-chat-to-bottom');

    
        }
        
            public function editDepartment()
            {
                $this->validate();
    
                $employee = Department::findOrFail($this->employee_id);
                $employee->update([
                    'description' => $this->description,
                    
                ]);
        
           
            }
    public function render()
    {
        
        return view('livewire.h-r.chat');
    }
}
