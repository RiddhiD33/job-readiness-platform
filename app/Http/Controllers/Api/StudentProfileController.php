<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentProfile;

class StudentProfileController extends Controller
{
    public function index(){
        $studentProfiles = StudentProfile::all();

        return response()->json($studentProfiles);
    }

    public function show($id){
        $studentProfile = StudentProfile::with(['user', 'careerPath'])->findOrFail($id);
        return response()->json($studentProfile);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'phone' => 'required|digits:10',
        'current_city' => 'required|string',
        'cgpa' => 'nullable|numeric',
        'portfolio_url' => 'nullable|url',
        'resume_url' => 'nullable|url',
        'career_path_id' => 'required|exists:career_paths,id',
    ]);

    $validated['profile_status'] = 'draft';

    $studentProfile = StudentProfile::create($validated);

    return response()->json($studentProfile, 201);
}

  public function update(Request $request, $id)
{
    $studentProfile = StudentProfile::findOrFail($id);

    $validated = $request->validate([
        'phone' => 'sometimes|digits:10',
        'current_city' => 'sometimes|string',
        'cgpa' => 'sometimes|nullable|numeric',
        'portfolio_url' => 'sometimes|nullable|url',
        'resume_url' => 'sometimes|nullable|url',
        'career_path_id' => 'sometimes|exists:career_paths,id',
        'profile_status' => 'sometimes|in:draft,public',
    ]);

    $studentProfile->update($validated);

    return response()->json($studentProfile);
}

    public function destroy($id)
{
    $studentProfile = StudentProfile::findOrFail($id);

    $studentProfile->delete();

    return response()->json([
        "message" => "Record Deleted Successfully"
    ]);
}
}
