<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\OffDutyCategory;
use App\Models\OffDutyDates;

use Illuminate\Support\Facades\Auth;
class AddOffDutyDate extends Component
{
 protected $listeners = ['OffCatAddeded' => 'updatedOffDuty'];

   
    public $OffdutyC;
    public $description='',$date='',$percentage='',$category_id='';
     public $companyId;

    public function mount()
    {
      
        $this->updatedOffDuty();
    }

public function updatedOffDuty()
    {
        $this->companyId = Auth::user()->company_id ; 
        $this->OffdutyC = OffDutyCategory::all();

    }

        protected $rules = [
            'description' => 'required',
            'category_id'=> 'required',
            'date'=> 'required|date',
            'percentage'=> 'required|numeric|min:0|max:100',
            
        ];
 
            
public function add_OffDate()
    {
       
        $this->validate();
           
        $this->companyId = Auth::user()->company_id;

        OffDutyDates::create([
            'company_id' => $this->companyId,
            'description' => $this->description,
            'category_id'=> $this->category_id,
            'date'=> $this->date,
            'percentage' => $this->percentage / 100,

        ]);

       

        $this->reset([ 'description',
        'category_id',
        'date',
        'percentage',]);
        return redirect()->intended('/admin/off-duty')->with('OffDate-add', 'Successfully');
  
    }




    public function render()
    {
        return view('livewire.h-r.add-off-duty-date');
    }
}
