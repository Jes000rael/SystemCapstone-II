<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\Department;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditDepartment extends Component
{

    public $description='';
    public $department_id='';

    protected $rules = [
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($departmentID)
        {
            
            try {
           
                $decryptedDepartmentID = Crypt::decrypt($departmentID);
         
                $department = Department::findOrFail($decryptedDepartmentID);
            
           
                $this->description = $department->description;
                $this->department_id = $department->department_id;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted department ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Department not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editDepartment()
        {
            $this->validate();

            $employee = Department::findOrFail($this->department_id);
            $employee->update([
                'description' => $this->description,
                
            ]);
    
       
            return redirect()->intended('/admin/department')->with('updateDepartment', 'Successfull');
        }
    public function render()
    {
        return view('livewire.h-r.edit-department');
    }
}
