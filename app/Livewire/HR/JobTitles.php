<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Auth;


class JobTitles extends Component
{

    public $job;

    public function mount()
    {
      
        $companyId = Auth::user()->company_id ; 
            $this->job = JobTitle::where('company_id', $companyId)->get();
      
    }
    public function render()
    {
        return view('livewire.h-r.job-titles');
    }
}
