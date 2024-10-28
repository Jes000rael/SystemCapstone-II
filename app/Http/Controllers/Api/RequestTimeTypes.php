<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestTimeType;


class RequestTimeTypes extends Controller
{
    public function index()
    {
        return RequestTimeType::all();
    }

    public function show($id)
    {
        $RequestTimeType = RequestTimeType::where('Request_type_id', $id)->first();

        if (!$RequestTimeType) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($RequestTimeType);;
    }

    public function store(Request $request)
    {
        $item = RequestTimeType::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $RequestTimeType = RequestTimeType::where('Request_type_id', $id)->first();
        if (!$RequestTimeType) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $RequestTimeType->update($request->all());
            return response()->json($RequestTimeType, 200);
    }

    public function destroy($id)
    {
        $RequestTimeType = RequestTimeType::where('Request_type_id', $id)->first();

        if (!$RequestTimeType) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $RequestTimeType->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
