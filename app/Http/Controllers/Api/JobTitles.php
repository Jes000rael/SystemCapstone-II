<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobTitle;

class JobTitles extends Controller
{
    public function index()
    {
        return JobTitle::all();
    }

    public function show($id)
    {
        $JobTitle = JobTitle::where('Job_title_id', $id)->first();

        if (!$JobTitle) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($JobTitle);
    }

    public function store(Request $request)
    {
        $item = JobTitle::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $JobTitle = JobTitle::where('Job_title_id', $id)->first();
        if (!$JobTitle) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $JobTitle->update($request->all());
            return response()->json($JobTitle, 200);
    }

    public function destroy($id)
    {

        $JobTitle = JobTitle::where('Job_title_id', $id)->first();

        if (!$JobTitle) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $JobTitle->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
