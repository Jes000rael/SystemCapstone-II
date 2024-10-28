<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeritCategory;


class MeritCategorys extends Controller
{
    public function index()
    {
        return MeritCategory::all();
    }

    public function show($id)
    {
        $MeritCategory = MeritCategory::where('Merit_category_id', $id)->first();

    if (!$MeritCategory) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($MeritCategory);
    }

    public function store(Request $request)
    {
        $item = MeritCategory::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $MeritCategory = MeritCategory::where('Merit_category_id', $id)->first();
    if (!$MeritCategory) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $MeritCategory->update($request->all());
        return response()->json($MeritCategory, 200);
    }

    public function destroy($id)
    {

        $MeritCategory = MeritCategory::where('Merit_category_id', $id)->first();

        if (!$MeritCategory) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $MeritCategory->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
