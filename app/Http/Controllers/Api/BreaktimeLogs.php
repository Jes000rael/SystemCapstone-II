<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BreaktimeLog;



class BreaktimeLogs extends Controller
{
    public function index()
    {
        return BreaktimeLog::all();
    }

    public function show($id)
    {
        $breakTimeLog = BreaktimeLog::where('Breaktime_id', $id)->first();

    if (!$breakTimeLog) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($breakTimeLog);
    }

    public function store(Request $request)
    {
        $item = BreaktimeLog::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $BreaktimeLog = BreaktimeLog::where('Breaktime_id', $id)->first();
        if (!$BreaktimeLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $BreaktimeLog->update($request->all());
            return response()->json($BreaktimeLog, 200);
    }

    public function destroy($id)
    {

        $breakTimeLog = BreaktimeLog::where('Breaktime_id', $id)->first();

        if (!$breakTimeLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $breakTimeLog->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
