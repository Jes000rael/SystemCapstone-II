<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeniorityLevel;


class SeniorityLevels extends Controller
{
    public function index()
    {
        return SeniorityLevel::all();
    }

    public function show($id)
    {
        $SeniorityLevel = SeniorityLevel::where('Seniority_level_id', $id)->first();

        if (!$SeniorityLevel) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($SeniorityLevel);
    }

    public function store(Request $request)
    {
        $item = SeniorityLevel::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $SeniorityLevel = SeniorityLevel::where('Seniority_level_id', $id)->first();
        if (!$SeniorityLevel) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $SeniorityLevel->update($request->all());
            return response()->json($SeniorityLevel, 200);
    }

    public function destroy($id)
    {
        $SeniorityLevel = SeniorityLevel::where('Seniority_level_id', $id)->first();

        if (!$SeniorityLevel) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $SeniorityLevel->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
