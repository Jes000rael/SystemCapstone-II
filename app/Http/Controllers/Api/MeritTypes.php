<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeritType;


class MeritTypes extends Controller
{
    public function index()
    {
        return MeritType::all();
    }

    public function show($id)
    {
        $MeritType = MeritType::where('Merit_type_id', $id)->first();

    if (!$MeritType) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($MeritType);
    }

    public function store(Request $request)
    {
        $item = MeritType::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $MeritType = MeritType::where('Merit_type_id', $id)->first();
        if (!$MeritType) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $MeritType->update($request->all());
            return response()->json($MeritType, 200);
    }

    public function destroy($id)
    {
        $MeritType = MeritType::where('Merit_type_id', $id)->first();

        if (!$MeritType) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $MeritType->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
