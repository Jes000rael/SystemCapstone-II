<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\EmployeeRecords;

use Livewire\Component;

class Employee extends Component
{


    public EmployeeRecords $user;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;

 


    
    protected $rules = [
        'user.first_name' => 'max:40|min:3',
        'user.last_name' => 'email:rfc,dns',
        'user.contact_number' => 'max:10',
        'user.date_hired' => 'max:200',
        'user.address' => 'min:3'
    ];

    public $activeTab = 'empRecords'; 


    public function switchTab($tab)
    {
        $this->activeTab = $tab;
        $this->dispatch('elementUpdated');
    }

    public function mount() { 
        $this->user = auth()->user();
    }

    public function save() {
        $this->validate();
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }
    public function render()
    {
        return view('livewire.laravel-examples.employee');
    }
}
