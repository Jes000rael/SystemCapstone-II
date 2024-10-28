<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absences;


class Absence extends Controller
{
    public function index()
    {
        return Absences::all();
    }

    public function show($id)
    {
        $Absences = Absences::where('Absent_id', $id)->first();

    if (!$Absences) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($Absences);

    }

    public function store(Request $request)
    {
        
    $validatedData = $request->validate([
        'Employee_id' => 'required', 
        'Attendance_id' => 'required', 
        'Reason'=> 'required',
        'Date'=> 'required',
       
    ]);

 
    $item = Absences::create($validatedData);

 
    return response()->json($item, 201);


    }

    public function update(Request $request, $id)
    {
    $absences = Absences::where('Absent_id', $id)->first();
    if (!$absences) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $absences->update($request->all());
        return response()->json($absences, 200);


    }

    public function destroy($id)
    {
        $Absences = Absences::where('Absent_id', $id)->first();

        if (!$Absences) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Absences->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
