<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Auth;
class AddJob extends Component
{

public $description='';
    public $companyId;
    protected $rules = [
        'description' => 'required',
    ];


    public function add_job()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;

        JobTitle::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description']);
        return redirect()->intended('admin/jobtitle')->with('job-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-job');
    }
}
