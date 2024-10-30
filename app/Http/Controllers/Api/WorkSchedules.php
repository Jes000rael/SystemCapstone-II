<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkSchedule;

class WorkSchedules extends Controller
{
    public function index()
    {
        $WorkSchedule = WorkSchedule::with('employee')->get();

        return response()->json([
            'work_schedules' => $WorkSchedule
        ]);
    }

    public function show($id)
    {
        $WorkSchedule = WorkSchedule::with('employee')->find($id);
        if (!$WorkSchedule) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($WorkSchedule);
    }

    public function store(Request $request)
    {
        $item = WorkSchedule::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $WorkSchedule = WorkSchedule::where('work_schedule_id', $id)->first();
        if (!$WorkSchedule) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $WorkSchedule->update($request->all());
            return response()->json($WorkSchedule, 200);
    }

    public function destroy($id)
    {

        $WorkSchedule = WorkSchedule::where('work_schedule_id', $id)->first();

        if (!$WorkSchedule) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $WorkSchedule->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
