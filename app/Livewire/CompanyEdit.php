<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class CompanyEdit extends Component
{


 public $description='';
    public $company_id='';
    public $timezone='';
    public $timezones = [];
    public $company;
    protected $rules = [
     
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($companyID)
        {
          
            $this->timezones = collect(\DateTimeZone::listIdentifiers())
                    ->groupBy(fn($timezone) => explode('/', $timezone, 2)[0]);
          
            try {
           
                $decryptedcompanyID = Crypt::decrypt($companyID);
            $depap = Company::findOrFail($decryptedcompanyID);

            $this->description = $depap->description;
            $this->timezone = $depap->timezone;
            $this->company_id = $depap->company_id;
           
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted Company ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Company not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
           
        }
    
      
    
        public function editCompany()
        {
            $this->validate();
            $compa = Company::findOrFail($this->company_id);
            $compa->update([
                'description' => $this->description,
                'timezone' => $this->timezone,
             
          
                
            ]);
    
            return redirect()->intended('company/add_company')->with('updatecompany', 'Successfull');
        }
    public function render()
    {
        return view('livewire.company-edit');
    }
}
