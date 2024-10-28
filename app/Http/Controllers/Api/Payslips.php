<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payslip;
use App\Models\AttendanceRecord;


class Payslips extends Controller
{
    public function index()
    {
        $Payslip = Payslip::with('attendance','cutoff')->get();

        return response()->json([
            'attendance_records' => $Payslip
        ]);
    }

    public function show($id)
    {
        $Payslip = Payslip::where('Payslip_id', $id)->first();

        if (!$Payslip) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($Payslip);
    }

    public function store(Request $request)
    {
        $item = Payslip::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Payslip = Payslip::where('Payslip_id', $id)->first();
        if (!$Payslip) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $Payslip->update($request->all());
            return response()->json($Payslip, 200);
    }

    public function destroy($id)
    {
        $Payslip = Payslip::where('Payslip_id', $id)->first();

        if (!$Payslip) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        $Payslip->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
