<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\Deductions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditDeduction extends Component
{

 public $description='';
 public $value='';
    public $deductions_id='';

    protected $rules = [
        'description' => 'required',
        'value' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
    ];
       
            
    
        public function mount($deducID)
        {
            try {
           
                $decrypteddeducID = Crypt::decrypt($deducID);

                $deduction = Deductions::findOrFail($decrypteddeducID);

                $this->description = $deduction->description;

                $this->value = $deduction->value;

                $this->deductions_id = $deduction->deductions_id;
                
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted deduction ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'deduction not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editDeduc()
        {
            $this->validate();

            $employee = Deductions::findOrFail($this->deductions_id);
            $employee->update([
                'description' => $this->description,
                'value' => $this->value,
            ]);
    
       
            return redirect()->intended('/admin/deduction')->with('updateDeduction', 'Successfull');
        }
    public function render()
    {
        return view('livewire.h-r.edit-deduction');
    }
}
