<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\EmploymentStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditEmploystat extends Component
{



public $description='';
    public $employment_status_id   ='';

    protected $rules = [
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($employmentID)
        {
            
            try {
           
                $decryptedemploymentID = Crypt::decrypt($employmentID);
         
                $employment = EmploymentStatus::findOrFail($decryptedemploymentID);

                $this->description = $employment->description;
                $this->employment_status_id    = $employment->employment_status_id   ;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted employment ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'employment not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editemployment()
        {
            $this->validate();

            $bloo = EmploymentStatus::findOrFail($this->employment_status_id   );
            $bloo->update([
                'description' => $this->description,
                
            ]);
    
       
            return redirect()->intended('/admin/employee-status')->with('updateemployment', 'Successfully');
        }

    public function render()
    {
        return view('livewire.h-r.edit-employstat');
    }
}
