<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobTitle;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class JobEdit extends Component
{


 public $description='';
    public $company_id='';
    public $job_title_id='';
    public $company;
    protected $rules = [
        'company_id' => 'required',
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($jobID)
        {
            
            $this->loadDropdownData();
            try {
           
                $decryptedjobID = Crypt::decrypt($jobID);
            $depap = JobTitle::findOrFail($decryptedjobID);

            $this->description = $depap->description;
            $this->job_title_id = $depap->job_title_id;
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
    
        public function editJob()
        {
            $this->validate();
            $employee = JobTitle::findOrFail($this->job_title_id);
            $employee->update([
                'description' => $this->description,
                'company_id' => $this->company_id,
                
            ]);
    
            session()->flash('message', 'Employee updated successfully!');
            return redirect()->intended('/company/job')->with('updatejob', 'Successfull');
        }
    public function render()
    {
        return view('livewire.job-edit');
    }
}
