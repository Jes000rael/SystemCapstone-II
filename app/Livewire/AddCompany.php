<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

class AddCompany extends Component
{
    use WithFileUploads;
    public $description='';
    public $image='';
    public $company;
    protected $rules = [
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];
    public function mount()
    {
      
                $this->company = Company::all();
           

    }
    public function add_company()
    {
        $this->validate();
        $imagePath = $this->image->store('assets', 'public');

        Company::create([
            'description' => $this->description,
            'image' => $imagePath,
         
        ]);
        $this->reset(['description','image']);
    }
    public function render()
    {
        return view('livewire.add-company');
    }
}
