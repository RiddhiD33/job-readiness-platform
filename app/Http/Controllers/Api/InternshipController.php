<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function index(){
        $internship = Internship::all();

        return response()->json($internship);
    }

    public function show($id){
        $internship = Internship::findORFail($id);

        return response()->json($internship);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_profile_id'=>'required|exists:student_profiles,id',
            'company_name'=>'required|string|max:255',
            'designation'=>'required|string|max:255',
            'start_date'=>'required|date',
            'end_date'=>'nullable|date',
            'description'=>'required|string',
            'certificate_url'=>'nullable|url',
            'github_link'=>'nullable|url',
            'demo_link'=>'nullable|url',
        ]);

        $validated['status']='draft';

        $internship = Internship::create($validated);

        return response()->json($internship,201);
    }

    public function destroy($id){
        $internship = Internship::findOrFail($id);

        $internship -> delete();

        return response()->json([
            "message"=>"Record deleted successfully"
        ]);
    }

    
    public function update(Request $request, $id){
        $internship = Internship::findOrFail($id);

        $validated = $request->validate([
            'company_name'=>'sometimes|string|max:255',
            'designation'=>'sometimes|string|max:255',
            'start_date'=>'sometimes|date',
            'end_date'=>'sometimes|nullable|date',
            'description'=>'sometimes|string',
            'certificate_url'=>'sometimes|nullable|url',
            'github_link'=>'sometimes|nullable|url',
            'demo_link'=>'sometimes|nullable|url',
            'status'=>'sometimes|in:draft,published',
        ]);

        $internship -> update($validated);

        return response()->json($internship);
    }
}

