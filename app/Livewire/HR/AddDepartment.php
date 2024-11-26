<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
class AddDepartment extends Component
{

    public $description='';
   public $companyId;
    protected $rules = [
        'description' => 'required',
    ];
 public function add_department()
    {
       
        $this->validate();

       
        $this->companyId = Auth::user()->company_id;

       
        Department::create([
            'description' => $this->description,
            'company_id' => $this->companyId,
        ]);

        
        $this->reset(['description']);
      
        return redirect()->intended('/admin/department')->with('department-add', 'Successfully');
        
  
    }
    public function render()
    {
        return view('livewire.h-r.add-department');
    }
}
