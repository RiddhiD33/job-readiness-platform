<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentAttempt;

class AssessmentAttemptController extends Controller
{
    public function index(){
        $assessmentAttempt = AssessmentAttempt::all();
        return response()->json($assessmentAttempt);
    }

    public  function show($id){
        $assessmentAttempt = AssessmentAttempt::findOrFail($id);
        return response()->json($assessmentAttempt);
    }

    public function store(Request $request){
    $validated = $request->validate([
        'student_profile_id' => 'required|exists:student_profiles,id',
        'assessment_id' => 'required|exists:assessments,id',
    ]);

    $validated['score'] = null;

    $assessmentAttempt = AssessmentAttempt::create($validated);

    return response()->json($assessmentAttempt, 201);
}
    public function update(Request $request, $id){
        $assessmentAttempt = AssessmentAttempt::findORFail($id);

        $validated = $request->validate([
            'student_profile_id'=>'sometimes|exists:student_profiles,id',
            'assessment_id'=>'sometimes|exists:assessments,id',
            'score'=>'sometimes|nullable|numeric',
        ]);

        $assessmentAttempt ->update($validated);

        return response()->json($assessmentAttempt);
    }

    public function destroy($id){
        $assessmentAttempt = AssessmentAttempt::findORFail($id);

        $assessmentAttempt->delete();

        return response()->json(['message'=>'Record deleted successfully']);
    }

}
