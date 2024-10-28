<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;


class Departments extends Controller
{
    public function index()
    {
        return Department::all();
    }

    public function show($id)
    {
        $Department = Department::where('Department_id', $id)->first();

    if (!$Department) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($Department);
    }

    public function store(Request $request)
    {
        $item = Department::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Department = Department::where('Department_id', $id)->first();
        if (!$Department) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $Department->update($request->all());
            return response()->json($Department, 200);
    }

    public function destroy($id)
    {
        $Department = Department::where('Department_id', $id)->first();

        if (!$Department) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Department->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
