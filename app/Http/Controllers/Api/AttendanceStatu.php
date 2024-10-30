<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttendanceStatus;


class AttendanceStatu extends Controller
{
    public function index()
    {
        return AttendanceStatus::all();
    }

    public function show($id)
    {
        $AttendanceStatus = AttendanceStatus::where('status_id', $id)->first();

    if (!$AttendanceStatus) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($AttendanceStatus);

    }

    public function store(Request $request)
    {
        
    $validatedData = $request->validate([
        'Employee_id' => 'required', 
        'Attendance_id' => 'required', 
        'Reason'=> 'required',
        'Date'=> 'required',
       
    ]);

 
    $item = AttendanceStatus::create($validatedData);

 
    return response()->json($item, 201);


    }

    public function update(Request $request, $id)
    {
    $AttendanceStatus = AttendanceStatus::where('status_id', $id)->first();
    if (!$AttendanceStatus) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $AttendanceStatus->update($request->all());
        return response()->json($AttendanceStatus, 200);


    }

    public function destroy($id)
    {
        $AttendanceStatus = AttendanceStatus::where('status_id', $id)->first();

        if (!$AttendanceStatus) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $AttendanceStatus->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
