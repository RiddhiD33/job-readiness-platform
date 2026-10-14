<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    public function index(){
        $assessment = Assessment::all();
        return response()->json($assessment);
    }

    public function show($id){
        $assessment = Assessment::findORFail($id);
        return response()->json($assessment);
    }

    public function studentAssessments(Request $request)
{
    $student = $request->user();

    $profile = $student->studentProfile;

    if (!$profile || !$profile->career_path_id) {
        return response()->json([
            'message' => 'Student has not selected a career path.'
        ], 404);
    }

    $assessments = Assessment::where(
        'career_path_id',
        $profile->career_path_id
    )->get();

    return response()->json($assessments);
}
}
