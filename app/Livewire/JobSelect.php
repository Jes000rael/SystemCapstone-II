<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobTitle;

class JobSelect extends Component
{
    public $job;

    public function mount()
    {
        $this->updateJob();
    }
    
    public function updateJob()
    {
        $this->job = JobTitle::all();
    }
    public function deleteJobtitle($jobId)

{
    if ($jobId) {
    JobTitle::find($jobId)->delete();
    
        $this->updateJob();
        return redirect()->intended('/company/job')->with('job-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.job-select');
    }
}
