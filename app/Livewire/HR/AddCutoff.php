<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Cutoff;
use Illuminate\Support\Facades\Auth;
class AddCutoff extends Component
{
 
public $date_start='';
public $date_end='';
public $conversion_rate='';
   public $companyId;
    protected $rules = [
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'conversion_rate' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
    ];
 public function add_Cutoff()
    {
       
        $this->validate();

       
        $this->companyId = Auth::user()->company_id;

       
        Cutoff::create([
            'company_id' => $this->companyId,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'conversion_rate' => $this->conversion_rate,

        ]);

        
        $this->reset(['date_start','date_end','conversion_rate']);
      
        return redirect()->intended('/admin/cutoff')->with('cutoff-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-cutoff');
    }
}
