<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\OffDutyCategory;
use Illuminate\Support\Facades\Auth;
class AddOffDutyCat extends Component
{
    public $description='';
        public $companyId;
           
        protected $rules = [
            'description' => 'required',
        ];
 
            
public function add_OffCat()
    {
       
        $this->validate();
           
        $this->companyId = Auth::user()->company_id;

        OffDutyCategory::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);

        $this->dispatch('OffCatAddeded');
        $this->dispatch('close-modal');
        $this->dispatch('offcatduty-added', ['message' => 'Offcatduty added successfully!']);
        $this->reset(['description']);
        // return redirect()->intended('/company/OffCat')->with('OffCat-add', 'Successfully');
  
    }

    public function render()
    {
        return view('livewire.h-r.add-off-duty-cat');
    }
}
