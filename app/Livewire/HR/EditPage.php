<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;


class EditPage extends Component
{

    public $employee_id='';
    public $username='';
   

    public $password='';
    
    public function getRules()
    {
        return [
       
            'username' => 'required|unique:employee_records,username,' . $this->employee_id . ',employee_id', 
            'password' => 'required',
          
          
    
        ];
    }
 
   
  public function mount($pageID)
        {
            $this->loadDropdownData();
            try {
           
                $decryptedpageID = Crypt::decrypt($pageID);
         
                $page = EmployeeRecords::findOrFail($decryptedpageID);

                $this->employee_id = $page->employee_id;
                $this->username = $page->username;
                $this->password = $page->password_string;
            
              
           
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted Page ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Page not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
        }
      
        public function loadDropdownData()
            {
                $companyId = Auth::user()->company_id;
                $this->category = EmployeeRecords::where('company_id',$companyId)->get();
            }
    
        public function edit_Page()
        {
            $this->validate();

            $bloo = EmployeeRecords::findOrFail($this->employee_id);
            $bloo->update([

               'username' => $this->username,
            'password' => $this->password ? Hash::make($this->password) : $bloo->password,
            'password_string' => $this->password,
                
            ]);
    
       
            return redirect()->intended('/admin/create/attendace_page')->with('updatepage', 'Successfully');
        }
    public function render()
    {
        return view('livewire.h-r.edit-page');
    }
}
