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
    public $super;

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
        $companyId = Auth::user()->company_id;
    
  
        $groupedContacts = null;
        $groupedsupers = null;
    
        if ($companyId === 1) {
          
            $this->contacts = EmployeeRecords::where('company_id', $companyId)->get();
            $sortedContacts = $this->contacts->sortBy(function ($contact) {
                return strtoupper(substr($contact->first_name, 0, 1));
            });
            
            $groupedContacts = $sortedContacts->groupBy(function ($contact) {
                return strtoupper(substr($contact->first_name, 0, 1));
            });
        } else {
           
            $this->contacts = EmployeeRecords::where('company_id', $companyId)->get();

            $this->super = EmployeeRecords::where('company_id', 1)
                ->where('department_id', 1)
                ->get();
            
            $sortedsupers = $this->super->sortBy(function ($supers) {
                return strtoupper(substr($supers->employee->description ?? '', 0, 1));
            });
            
            $groupedsupers = $sortedsupers->groupBy(function ($supers) {
                return strtoupper(substr($supers->employee->description ?? '', 0, 1));
            });
            $sortedContacts = $this->contacts->sortBy(function ($contact) {
                return strtoupper(substr($contact->first_name, 0, 1));
            });
            
            $groupedContacts = $sortedContacts->groupBy(function ($contact) {
                return strtoupper(substr($contact->first_name, 0, 1));
            });
        }
    
      
        if ($companyId === 1) {
            return view('livewire.h-r.contacts', compact('groupedContacts'));
        } else {
            return view('livewire.h-r.contacts', compact('groupedContacts', 'groupedsupers'));
        }
    }
    

    
    
}
