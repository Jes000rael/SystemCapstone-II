<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;


class Shifts extends Controller
{
    public function index()
    {
        return Shift::all();
    }

    public function show($id)
    {
        $Shift = Shift::where('Shift_id', $id)->first();

        if (!$Shift) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($Shift);
    }

    public function store(Request $request)
    {
        $item = Shift::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Shift = Shift::where('Shift_id', $id)->first();
        if (!$Shift) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $Shift->update($request->all());
            return response()->json($Shift, 200);
    }

    public function destroy($id)
    {
        $Shift = Shift::where('Shift_id', $id)->first();

        if (!$Shift) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        $Shift->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
