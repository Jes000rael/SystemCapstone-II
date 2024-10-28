<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OffDutyDates;


class OffDutyDate extends Controller
{
    public function index()
    {
        $OffDutyDates = OffDutyDates::where('Holiday_id', $id)->first();

    if (!$OffDutyDates) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($OffDutyDates);
    }

    public function show($id)
    {
        return OffDutyDates::findOrFail($id);
    }

    public function store(Request $request)
    {
        $item = OffDutyDates::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $OffDutyDates = OffDutyDates::where('Holiday_id', $id)->first();
        if (!$OffDutyDates) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $OffDutyDates->update($request->all());
            return response()->json($OffDutyDates, 200);
    }

    public function destroy($id)
    {

        $OffDutyDates = OffDutyDates::where('Holiday_id', $id)->first();

        if (!$OffDutyDates) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        $OffDutyDates->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
