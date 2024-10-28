<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deductions;


class Deduction extends Controller
{
    public function index()
    {
        return Deductions::all();
    }

    public function show($id)
    {
        $Deductions = Deductions::where('deductions_id', $id)->first();

    if (!$Deductions) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($Deductions);
    }

    public function store(Request $request)
    {
        $item = Deductions::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Deductions = Deductions::where('deductions_id', $id)->first();
    if (!$Deductions) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $Deductions->update($request->all());
        return response()->json($Deductions, 200);
    }

    public function destroy($id)
    {

        $Deductions = Deductions::where('deductions_id', $id)->first();

        if (!$Deductions) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Deductions->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
