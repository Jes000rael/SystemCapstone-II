<?php

namespace App\Livewire\HR;


use Livewire\Component;
use App\Models\Message;
use App\Models\EmployeeRecords;
use Illuminate\Support\Facades\Auth;
class Contacts extends Component
{


    public $messages;
    public $contats;

    public function mount()
    {
        $this->messages = Message::with('employee')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();
    }
    
    public function render()
    {

        $companyId = Auth::user()->company_id ; 

        
        $this->contacts = EmployeeRecords::where('company_id', $companyId)->get();

       
        $sortedContacts = $this->contacts->sortBy(function ($contact) {
            return strtoupper(substr($contact->first_name, 0, 1)); 
        });

       
        $groupedContacts = $sortedContacts->groupBy(function ($contact) {
            return strtoupper(substr($contact->first_name, 0, 1)); 
        });
   
        return view('livewire.h-r.contacts', compact('groupedContacts'));
    }
}
