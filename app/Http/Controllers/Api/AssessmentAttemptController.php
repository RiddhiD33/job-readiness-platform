<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentAttempt;
use App\Services\ReadinessScoreService;

class AssessmentAttemptController extends Controller
{
    protected ReadinessScoreService $readinessScoreService;

public function __construct(ReadinessScoreService $readinessScoreService)
{
    $this->readinessScoreService = $readinessScoreService;
}


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

   public function evaluateAssessmentAttempt($id)
{
    $attempt = AssessmentAttempt::with([
        'assessmentAttemptAnswers.assessmentQuestion',
        'studentProfile.user'
    ])->findOrFail($id);

    $pendingAnswers = $attempt->assessmentAttemptAnswers
        ->where('is_checked', false);

    if ($pendingAnswers->isNotEmpty()) {

        return response()->json([
            'message' => 'Cannot evaluate assessment. Some answers are still pending review.',
            'pending_answers' => $pendingAnswers->count(),
        ], 422);

    }

    return response()->json([
        'message' => 'All answers have been reviewed.',
        'attempt' => $attempt,
    ]);
}

    public function destroy($id){
        $assessmentAttempt = AssessmentAttempt::findORFail($id);

        $assessmentAttempt->delete();

        return response()->json(['message'=>'Record deleted successfully']);
    }

    

}
