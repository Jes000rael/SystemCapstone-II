<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OffDutyCategory;


class OffDutyCategorys extends Controller
{
    public function index()
    {
        return OffDutyCategory::all();
    }

    public function show($id)
    {
        $OffDutyCategory = OffDutyCategory::where('Category_id', $id)->first();

        if (!$OffDutyCategory) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($OffDutyCategory);
    }

    public function store(Request $request)
    {
        $item = OffDutyCategory::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $OffDutyCategory = OffDutyCategory::where('Category_id', $id)->first();
        if (!$OffDutyCategory) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $OffDutyCategory->update($request->all());
            return response()->json($OffDutyCategory, 200);
    }

    public function destroy($id)
    {

        $OffDutyCategory = OffDutyCategory::where('Category_id', $id)->first();

        if (!$OffDutyCategory) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $OffDutyCategory->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
