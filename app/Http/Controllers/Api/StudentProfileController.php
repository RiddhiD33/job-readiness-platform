<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentProfile;

class StudentProfileController extends Controller
{
    public function show(Request $request){
        $studentProfile = $request->user()->studentProfile;
         if (!$studentProfile) {
        return response()->json([
            'message' => 'Student profile not found.'
        ], 404);
    }
    $studentProfile->load('careerPath');
        return response()->json($studentProfile);
    }

 public function store(Request $request)
{
    $user = $request->user();

    $studentProfile = $user->studentProfile;

    if ($studentProfile) {
        return response()->json([
            'message' => 'Student profile already exists.'
        ], 409);
    }

    $validated = $request->validate([
        'phone' => 'required|digits:10',
        'current_city' => 'required|string',
        'cgpa' => 'nullable|numeric',
        'portfolio_url' => 'nullable|url',
        'resume_url' => 'nullable|url',
        'career_path_id' => 'required|exists:career_paths,id',
    ]);

    $validated['user_id'] = $user->id;

    $validated['profile_status'] = 'draft';

    $studentProfile = StudentProfile::create($validated);

    return response()->json($studentProfile, 201);
}

  public function update(Request $request)
{
    $user = $request->user(); 

    $studentProfile = $user->studentProfile;

    if (!$studentProfile) {
        return response()->json([
            'message' => 'Student profile not found.'
        ], 404);
    }

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

    public function destroy(Request $request)
{
    $user = $request->user();

    $studentProfile = $user->studentProfile;

    if (!$studentProfile) {
        return response()->json([
            'message' => 'Student profile not found.'
        ], 404);
    }

    $studentProfile->delete();

    return response()->json([
        'message' => 'Record Deleted Successfully'
    ]);
}
}
