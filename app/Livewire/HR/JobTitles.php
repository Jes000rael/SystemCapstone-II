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
      
        $this->updateJob();
    
      
    }

public function updateJob()
    {
        $companyId = Auth::user()->company_id ; 
        $this->job = JobTitle::where('company_id', $companyId)->get();
    }
    public function deleteJobtitle($jobId)

{
    if ($jobId) {
    JobTitle::find($jobId)->delete();
    
        $this->updateJob();
        return redirect()->intended('/admin/jobtitle')->with('job-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}

public function DeleteHoliday()
{
    
}
    public function render()
    {
        return view('livewire.h-r.job-titles');
    }
}
