<?php

namespace App\Livewire\HR;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeRecords;
use App\Models\Company;


class AttendancePage extends Component
{
    public $page;
public function mount()
    {
      
        $this->updatePage();
    
      
    }

public function updatePage()
    {
        $companyId = Auth::user()->company_id ; 
        $this->page = EmployeeRecords::where('company_id', $companyId)
        ->where('department_id', 3)
        ->get();
    
    }
    public function deletePage($pageId)

{
    if ($pageId) {
        EmployeeRecords::find($pageId)->delete();
    
        $this->updatePage();
        return redirect()->intended('/admin/create/attendace_page')->with('Page-deleted', 'Successfully');


       
    }

}
    public function render()
    {
        return view('livewire.h-r.attendance-page');
    }
}
