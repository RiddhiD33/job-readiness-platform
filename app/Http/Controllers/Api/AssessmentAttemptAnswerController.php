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
        'assessment_attempt_id'  => 'required|exists:assessment_attempts,id',
        'assessment_question_id' => 'required|exists:assessment_questions,id',
        'answer'                 => 'required',
    ]);

    // Get logged in student's profile
    $studentProfile = auth()->user()->studentProfile;

    if (!$studentProfile) {
        return response()->json([
            'message' => 'Student profile not found.'
        ], 404);
    }

    // Find assessment attempt
    $attempt = AssessmentAttempt::findOrFail($validated['assessment_attempt_id']);

    // Ensure the attempt belongs to the logged-in student
    if ($attempt->student_profile_id !== $studentProfile->id) {
        return response()->json([
            'message' => 'Unauthorized.'
        ], 403);
    }

    // Find question
    $question = AssessmentQuestion::findOrFail($validated['assessment_question_id']);

    // Ensure the question belongs to the assessment
    if ($attempt->assessment_id !== $question->assessment_id) {
        return response()->json([
            'message' => 'Question does not belong to this assessment.'
        ], 422);
    }

    // Prevent duplicate answers
    $alreadyAnswered = AssessmentAttemptAnswer::where(
            'assessment_attempt_id',
            $validated['assessment_attempt_id']
        )
        ->where(
            'assessment_question_id',
            $validated['assessment_question_id']
        )
        ->exists();

    if ($alreadyAnswered) {
        return response()->json([
            'message' => 'You have already answered this question.'
        ], 409);
    }

    // Save answer
    $assessmentAttemptAnswer = AssessmentAttemptAnswer::create([
        'assessment_attempt_id'  => $validated['assessment_attempt_id'],
        'assessment_question_id' => $validated['assessment_question_id'],
        'answer'                 => $validated['answer'],
    ]);

    return response()->json([
        'message' => 'Answer submitted successfully.',
        'data' => $assessmentAttemptAnswer,
    ], 201);
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
