<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmploymentStatus;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class EmploymentEdit extends Component
{


 public $description='';
    public $company_id='';
    public $employment_status_id ='';
    public $company;
    protected $rules = [
        'company_id' => 'required',
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($employmentID)
        {
            
            $this->loadDropdownData();
            try {
           
                $decryptedemploymentID = Crypt::decrypt($employmentID);
            $depap = EmploymentStatus::findOrFail($decryptedemploymentID);

            $this->description = $depap->description;
            $this->employment_status_id  = $depap->employment_status_id ;
            $this->company_id = $depap->company_id;
           
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted job ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'job not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        }
    
        public function loadDropdownData()
        {
            $this->company = Company::all();
        
        }
    
        public function editEmployment()
        {
            $this->validate();
            $sensen = EmploymentStatus::findOrFail($this->employment_status_id );
            $sensen->update([
                'description' => $this->description,
                'company_id' => $this->company_id,
                
            ]);
    
           
            return redirect()->intended('/company/employment')->with('updateemployment', 'Successfull');
        }
    public function render()
    {
        return view('livewire.employment-edit');
    }
}
