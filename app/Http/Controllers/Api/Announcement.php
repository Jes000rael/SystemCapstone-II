<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcements;


class Announcement extends Controller
{
    public function index()
    {
        return Announcements::all();
    }

    public function show($id)
    {
        $Announcements = Announcements::where('Announcement_id', $id)->first();

        if (!$Announcements) {
            return response()->json(['message' => 'Log not found'], 404);
        }
    
        return response()->json($Announcements);
    }

    public function store(Request $request)
    {
        $item = Announcements::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $Announcements = Announcements::where('Announcement_id', $id)->first();
    if (!$Announcements) {
        return response()->json(['message' => 'Log not found'], 404);
    }
    
     $Announcements->update($request->all());
        return response()->json($Announcements, 200);
    }

    public function destroy($id)
    {

        $Announcements = Announcements::where('Announcement_id', $id)->first();

        if (!$Announcements) {
            return response()->json(['message' => 'Log not found'], 404);
        }
        $Announcements->delete();

        return response()->json(['message' => 'Log deleted successfully'], 200);
    }
}
