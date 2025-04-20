<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\AttendanceRecord;
use App\Models\OvertimeLog;
use App\Models\RequestTimeType;
use App\Models\RequestTimeAdjustments;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TimeAdjustment extends Component
{

    public $adjusttype;
    public function mount()
{
    $companyId = Auth::user()->company_id ; 
    $this->adjusttype = RequestTimeAdjustments::where('company_id', $companyId)->get();
}
    public function render()
    {
        return view('livewire.h-r.time-adjustment');
    }
}
