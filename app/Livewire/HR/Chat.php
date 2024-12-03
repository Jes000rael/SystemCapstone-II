<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Message;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $messages;

    public $chatmessage ='';
  

    protected $rules = [
        'chatmessage' => 'required'
    ];

    public function mount()
    {
     
        $this->messages = Message::with('employee')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();


    }
    

    public function sendMessage()
    {
      
        Message::create([
            'employee_id' => Auth::user()->employee_id,
            'company_id' => Auth::user()->company_id,
            'chatmessage' => $this->chatmessage,
            'useremployee_id' => '1',
        ]);

       
        $this->messages = Message::with('employee')
            ->latest()
            ->take(50)
           
            ->get()

            ->reverse(); 
        $this->chatmessage = '';
       
        return redirect()->intended('admin/chat');
        $this->dispatch('scroll-chat-to-bottom');


    }

    public function render()
    {
        $companyId = Auth::user()->company_id ; 

        
         $contacts = EmployeeRecords::where('company_id', $companyId)->get();

        
         $sortedContacts = $contacts->sortBy(function ($contact) {
             return strtoupper(substr($contact->first_name, 0, 1)); 
         });
 
        
         $groupedContacts = $sortedContacts->groupBy(function ($contact) {
             return strtoupper(substr($contact->first_name, 0, 1)); 
         });
        return view('livewire.h-r.chat', compact('groupedContacts'));
    }
}
