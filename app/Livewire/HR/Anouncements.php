<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class Anouncements extends Component
{

    public $announce;
    

    public function mount()
    {
      
        $this->updateannounce();
    
      
    }

public function updateannounce()
    {
        $companyId = Auth::user()->company_id ; 
        $this->announce = Announcement::where('company_id', $companyId)->get();
    }
    public function deleteAnnouncement($announceId)

{
    if ($announceId) {
    Announcement::find($announceId)->delete();
    
        $this->updateannounce();
        return redirect()->intended('/admin/announcements')->with('announcement-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.anouncements');
    }
}
