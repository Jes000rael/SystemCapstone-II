<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeritLog;
use App\Models\MeritCategory;
use App\Models\MeritType;

class MeritLogs extends Controller
{
    public function index()
    {
        $MeritLog = MeritLog::with('meritCategory','meritType')->get();

        return response()->json([
            'merit_logs' => $MeritLog
        ]);
    }

    public function show($id)
    {
        $MeritLog = MeritLog::where('Merit_id', $id)->first();

        if (!$MeritLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($MeritLog);
    }

    public function store(Request $request)
    {
        $item = MeritLog::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $MeritLog = MeritLog::where('Merit_id', $id)->first();
        if (!$MeritLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $MeritLog->update($request->all());
            return response()->json($MeritLog, 200);
    }

    public function destroy($id)
    {

        $MeritLog = MeritLog::where('Merit_id', $id)->first();

        if (!$MeritLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $MeritLog->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
