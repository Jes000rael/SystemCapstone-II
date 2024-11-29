<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SeniorityLevel;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class SeniorityEdit extends Component
{


 public $description='';
    public $company_id='';
    public $seniority_level_id='';
    public $company;
    protected $rules = [
        'company_id' => 'required',
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($seniorID)
        {
            
            $this->loadDropdownData();
            try {
           
                $decryptedseniorID = Crypt::decrypt($seniorID);
            $depap = SeniorityLevel::findOrFail($decryptedseniorID);

            $this->description = $depap->description;
            $this->seniority_level_id = $depap->seniority_level_id;
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
    
        public function editSenior()
        {
            $this->validate();
            $sensen = SeniorityLevel::findOrFail($this->seniority_level_id);
            $sensen->update([
                'description' => $this->description,
                'company_id' => $this->company_id,
                
            ]);
    
           
            return redirect()->intended('/company/seniority')->with('updatesenior', 'Successfull');
        }
    public function render()
    {
        return view('livewire.seniority-edit');
    }
}
