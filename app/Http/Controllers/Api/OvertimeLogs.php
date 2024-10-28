<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OvertimeLog;

class OvertimeLogs extends Controller
{
    public function index()
    {
        $OvertimeLog = OvertimeLog::where('Overtime_id', $id)->first();

    if (!$OvertimeLog) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    return response()->json($OvertimeLog);
    }

    public function show($id)
    {
        return OvertimeLog::findOrFail($id);
    }

    public function store(Request $request)
    {
        $item = OvertimeLog::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $OvertimeLog = OvertimeLog::where('Overtime_id', $id)->first();
        if (!$OvertimeLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $OvertimeLog->update($request->all());
            return response()->json($OvertimeLog, 200);
    }

    public function destroy($id)
    {

        $OvertimeLog = OvertimeLog::where('Overtime_id', $id)->first();

        if (!$OvertimeLog) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $OvertimeLog->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
