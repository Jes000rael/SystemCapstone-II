<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploymentStatus;


class EmploymentStatu extends Controller
{
    public function index()
    {
        return EmploymentStatus::all();
    }

    public function show($id)
    {
        $EmploymentStatus = EmploymentStatus::where('Employment_status_id', $id)->first();

    if (!$EmploymentStatus) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($EmploymentStatus);
    }

    public function store(Request $request)
    {
        $item = EmploymentStatus::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $EmploymentStatus = EmploymentStatus::where('Employment_status_id', $id)->first();
        if (!$EmploymentStatus) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $EmploymentStatus->update($request->all());
            return response()->json($EmploymentStatus, 200);
    }

    public function destroy($id)
    {

        $EmploymentStatus = EmploymentStatus::where('Employment_status_id', $id)->first();

        if (!$EmploymentStatus) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $EmploymentStatus->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
