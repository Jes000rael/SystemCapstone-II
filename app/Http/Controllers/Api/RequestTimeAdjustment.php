<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestTimeAdjustments;


class RequestTimeAdjustment extends Controller
{
    public function index()
    {
        $RequestTimeAdjustments = RequestTimeAdjustments::with('requestTimetype')->get();

        return response()->json([
            'request_time_adjustments' => $RequestTimeAdjustments
        ]);
    }

    public function show($id)
    {
        $RequestTimeAdjustments = RequestTimeAdjustments::where('Time_adjusment_id', $id)->first();

        if (!$RequestTimeAdjustments) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($RequestTimeAdjustments);
    }

    public function store(Request $request)
    {
        $item = RequestTimeAdjustments::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $RequestTimeAdjustments = RequestTimeAdjustments::where('Time_adjusment_id', $id)->first();
        if (!$RequestTimeAdjustments) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $RequestTimeAdjustments->update($request->all());
            return response()->json($RequestTimeAdjustments, 200);
    }

    public function destroy($id)
    {
        $RequestTimeAdjustments = RequestTimeAdjustments::where('Time_adjusment_id', $id)->first();

        if (!$RequestTimeAdjustments) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $RequestTimeAdjustments->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
