<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Deductions;
use Illuminate\Support\Facades\Auth;
class Deduction extends Component
{

    public $dede;
public $description='';
    public $department,$companyId;
    protected $rules = [
        'description' => 'required',
    ];

    public function mount()
    {
        $this->updateDeductions();

    }

    public function updateDeductions()
{
   
    $companyId = Auth::user()->company_id ; 
           $this->dede = Deductions::where('company_id', $companyId)->get();
}
public function deleteDeduc($deductionsId)
{

    if ($deductionsId) {
    Deductions::find($deductionsId)->delete();
    
        $this->updateDeductions();

        return redirect()->intended('/admin/deduction')->with('deduction-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    
    public function render()
    {
        return view('livewire.h-r.deduction');
    }
}
