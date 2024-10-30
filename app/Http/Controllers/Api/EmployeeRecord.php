<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeRecords;
use App\Models\WorkSchedules;
use App\Models\Deductions;

use App\Models\MeritLogs;
use App\Models\Absences;





class EmployeeRecord extends Controller
{
    public function index()
    {
        $EmployeeRecords = EmployeeRecords::with('work_sched','deduction','meritLog','absence','shift','department','jobtitle','seniorityLevel','employmentStatus')->get();

        return response()->json([
            'employees' => $EmployeeRecords
        ]);
    }

    public function show($id)
    {
        $EmployeeRecords = EmployeeRecords::with('work_sched','deduction','meritLog','absence','shift','department','jobtitle','seniorityLevel','employmentStatus')->find($id);

        if (!$EmployeeRecords) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        return response()->json($EmployeeRecords);
    
       
    }

    public function store(Request $request)
    {
        $item = EmployeeRecords::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $EmployeeRecords = EmployeeRecords::where('employee_id', $id)->first();
        if (!$EmployeeRecords) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $EmployeeRecords->update($request->all());
            return response()->json($EmployeeRecords, 200);

        
    }

    public function destroy($id)
    {
        
        $EmployeeRecords = EmployeeRecords::with('work_sched','deduction','meritLog','absence','attendance','slip')->where('employee_id', $id)->first();

        if (!$EmployeeRecords) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        $EmployeeRecords->delete();
        $EmployeeRecords->work_sched()->delete();
        $EmployeeRecords->deduction()->delete();
        $EmployeeRecords->meritLog()->delete();
        $EmployeeRecords->absence()->delete();
        $EmployeeRecords->attendance()->delete();
        $EmployeeRecords->slip()->delete();
   

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
