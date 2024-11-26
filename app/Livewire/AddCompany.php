<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Company;

class AddCompany extends Component
{
  
    public $company;
   
protected $listeners = ['loadCompany' => 'loadCompanies'];
   
    public function mount()
    {
        $this->loadCompanies(); 

    }
    public function loadCompanies()
{
    $this->company = Company::all();
}

public function deleteCompany($companyId)

{

    if ($companyId) {
    Company::find($companyId)->delete();
    
        $this->loadCompanies();


        return redirect()->intended('/company/add_company')->with('company-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.add-company');
    }
}
