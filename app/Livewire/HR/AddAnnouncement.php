<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AddAnnouncement extends Component
{

public $description='';
public $date='';

    public $companyId;
    protected $rules = [
        'description' => 'required',
        'date' => 'required|date',
    ];


    public function add_announcement()
    {
        $this->validate();
       
        $this->companyId = Auth::user()->company_id;
        $dateTime = Carbon::parse($this->date . ' ' . Carbon::now()->format('H:i:s'));
        Announcement::create([
            'description' => $this->description,
            'date' => $dateTime,
            'company_id' => $this->companyId,
        ]);
        
        $this->reset(['description','date']);
        $this->dispatch('updateannounces');
        return redirect()->intended('/admin/announcements')->with('announcements-add', 'Successfully');
  
    }
    public function render()
    {
        return view('livewire.h-r.add-announcement');
    }
}
