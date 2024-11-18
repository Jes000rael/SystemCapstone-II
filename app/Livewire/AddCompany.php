<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Company;

class AddCompany extends Component
{
  
    public $description='';

    public $company;

 
    protected $rules = [
        'description' => 'required',
        
        
    ];
    public function mount()
    {
      
                $this->loadCompanies();     

    }
    public function loadCompanies()
{
    $this->company = Company::all();
}
    public function add_company()
    {
        $this->validate();
  

        Company::create([
            'description' => $this->description,
          
         
        ]);
        $this->loadCompanies();
        

        $this->reset(['description']);
    }




public function deleteCompany($companyId)

{

    if ($companyId) {
    Company::find($companyId)->delete();
    
        $this->loadCompanies();


        return redirect()->intended('/company/add_company')->with('company-deleted', 'Successfull');

        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.add-company');
    }
}
