<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\EmployeeRecords;

class Companys extends Controller
{
   

    public function index()
    {
        // return Company::all();

        $companies = Company::with('employee')->get();
        

        return response()->json([
            'companies' => $companies
        ]);
    }

    public function show($id)
    {
        
        $company = Company::with('employee')->where('company_id', $id)->first();

        if (!$company) {
            return response()->json(['message' => 'Company  not found'], 404);
        }
    
        return response()->json($company);
    }

    public function store(Request $request)
    {
        $item = Company::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Company = Company::where('company_id', $id)->first();
        if (!$Company) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        
         $Company->update($request->all());
            return response()->json($Company, 200);
    }

    public function destroy($id)
    {

        $Company = Company::with('employee')->where('company_id', $id)->first();

        if (!$Company) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        $Company->delete();

        $Company->employee()->delete();
       
       

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
