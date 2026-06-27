<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentAttempt;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentAttemptAnswer;


class AssessmentAttemptAnswerController extends Controller
{
    public function index(){
        $assessmentAttemptAnswer = AssessmentAttemptAnswer::all();
        return response()->json($assessmentAttemptAnswer);
    }

    public function show($id){
        $assessmentAttemptAnswer = AssessmentAttemptAnswer::findORFail($id);
        return response()->json($assessmentAttemptAnswer);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'assessment_attempt_id' => 'required|exists:assessment_attempts,id',
        'assessment_question_id' => 'required|exists:assessment_questions,id',
        'answer' => 'required',
        'score' => 'nullable|numeric',
    ]);

    $attempt = AssessmentAttempt::findOrFail($validated['assessment_attempt_id']);
    $question = AssessmentQuestion::findOrFail($validated['assessment_question_id']);

    if ($attempt->assessment_id !== $question->assessment_id) {
        return response()->json([
            'message' => 'Question does not belong to this assessment attempt'
        ], 422);
    }

    $assessmentAttemptAnswer = AssessmentAttemptAnswer::create($validated);

    return response()->json($answer, 201);
}

public function update(Request $request, $id){
    $assessmentAttemptAnswer = AssessmentAttemptAnswer::findORFail($id);

    $validated = $request->validate([
        'answer'=>'sometimes|string',
        'score'=>'sometimes|nullable|numeric',
    ]);

    $assessmentAttemptAnswer -> update($validated);

    return response()->json($assessmentAttemptAnswer);
}

public function destroy($id){
    $assessmentAttemptAnswer = AssessmentAttemptAnswer::findOrFail($id);

    $assessmentAttemptAnswer ->delete();

    return response()->json(['message'=>'Record deleted successfully']);
}
}
