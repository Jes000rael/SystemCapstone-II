<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\Company;



class CompanyLogo extends Component
{
    use WithFileUploads;

   
    public $logos;
    public $logos2;
    public $companyId;
  
    public function mount() { 

        if (Auth::check()) {
            
            $company_id = Auth::user()->company_id;
             $this->companyId = $company_id;
           
            $company = Company::where('company_id', $company_id)->first();

           

          
            if ($company){
               
                if($company_id === 1)
                {
                    $this->logos ='https://app.enopolyautomation.com/assets/images/enopoly.png';
                }
                else{
                    $this->logos2 = $company->image;  
                }
            } else {
               
                $this->logos = null;  
            }
    
           
        } else {
           
            $this->logos = null;  
        }
        
    }

    public function render()
    {
        return view('livewire.auth.company-logo');
    }
}
