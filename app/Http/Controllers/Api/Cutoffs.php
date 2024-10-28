<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cutoff;


class Cutoffs extends Controller
{
    public function index()
    {
        return Cutoff::all();
    }

    public function show($id)
    {
        $Cutoff = Cutoff::where('Cutoff_id', $id)->first();

        if (!$Cutoff) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($Cutoff);
    }

    public function store(Request $request)
    {
        $item = Cutoff::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Cutoff = Cutoff::where('Cutoff_id', $id)->first();
    if (!$Cutoff) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $Cutoff->update($request->all());
        return response()->json($Cutoff, 200);
    }

    public function destroy($id)
    {

        $Cutoff = Cutoff::where('Cutoff_id', $id)->first();

        if (!$Cutoff) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Cutoff->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
