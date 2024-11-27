<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Deductions;
use App\Models\EmployeeRecords;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AddDeduction extends Component
{



    public $description='';
    public $employee_id='',$value='';
    public $companyId;

    protected $rules = [
        'description' => 'required',
        'value' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
    ];
       
            
          
        
    
        public function mount($empID)
        {
            
            try {
           
                $decryptedempID = Crypt::decrypt($empID);
         
                $employee = EmployeeRecords::findOrFail($decryptedempID);
               
                $this->employee_id = $employee->employee_id;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted Employee ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Employee not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
        }
    
    
        public function addDeduction()
        {
            $this->validate();

   
            $this->companyId = Auth::user()->company_id;
            Deductions::create([

                'company_id' => $this->companyId,
                'employee_id' => $this->employee_id,
                'description' => $this->description,
                'value' => $this->value,
                
            ]);
    
            
            $this->reset(['description','value']);
          
            return redirect()->intended('/admin/employee_records')->with('deduction-add', 'Successfully');
    
       
          
        }
    public function render()
    {
        return view('livewire.h-r.add-deduction');
    }
}
