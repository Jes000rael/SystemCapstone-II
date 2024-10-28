<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Handbooks;


class Handbook extends Controller
{
    public function index()
    {
        return Handbooks::all();
    }

    public function show($id)
    {
        $Handbooks = Handbooks::where('Handbook_id', $id)->first();

        if (!$Handbooks) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($Handbooks);
    }

    public function store(Request $request)
    {
        $item = Handbooks::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Handbooks = Handbooks::where('Handbook_id', $id)->first();
    if (!$Handbooks) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $Handbooks->update($request->all());
        return response()->json($Handbooks, 200);
    }

    public function destroy($id)
    {

        $Handbooks = Handbooks::where('Handbook_id', $id)->first();

        if (!$Handbooks) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Handbooks->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
