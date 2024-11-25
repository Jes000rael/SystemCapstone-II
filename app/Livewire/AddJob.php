<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\JobTitle;
class AddJob extends Component
{

   
   public $description='';
    public $company_id='';
    public $company;
    protected $rules = [
        'description' => 'required',
        'company_id'=> 'required'
    ];

    public function mount()
    {

            $this->company = Company::all();

    }
    public function add_job()
    {
       
        $this->validate();
       
        JobTitle::create([
            'description' => $this->description,
            'company_id' => $this->company_id
        ]);

   
        
        $this->reset(['description','company_id']);
        return redirect()->intended('/company/job')->with('job-add', 'Successfully');
    
  
    }
    public function render()
    {
        return view('livewire.add-job');
    }
}
