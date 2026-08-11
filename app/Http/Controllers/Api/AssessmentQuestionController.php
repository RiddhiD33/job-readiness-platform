<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentQuestion;
use App\Models\Assessment;

class AssessmentQuestionController extends Controller
{
    public function index(){
        $assessmentQuestion = AssessmentQuestion::all();
        return response()->json($assessmentQuestion);
    }

    public function show($id){
        $assessmentQuestion = AssessmentQuestion::findORFail($id);
        return response()->json($assessmentQuestion);
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'assessment_id'=>'required|exists:assessments,id',
            'question_type'=>'required|in:mcq,practical',
            'question'=>'required|string',
            'options'=>'nullable|array',
            'correct_answer'=>'nullable',
            'max_score' => 'required|integer|min:1',
        ]);

        $assessmentQuestion = AssessmentQuestion::create($validated);
        return response()->json($assessmentQuestion,201);
    }

    public function update(Request $request,$id){
        $assessmentQuestion = AssessmentQuestion::findOrFail($id);

        $validated = $request->validate([
            'assessment_id'=>'sometimes|exists:assessments,id',
            'question_type'=>'sometimes|in:mcq,practical',
            'question'=>'sometimes|string',
            'options'=>'sometimes|nullable|array',
            'correct_answer'=>'sometimes|nullable',
            'max_score' => 'sometimes|integer|min:1',
        ]);

        $assessmentQuestion ->update($validated);

        return response()->json($assessmentQuestion);
    }

public function assessmentQuestions($assessmentId)
{
    $assessment = Assessment::with('assessmentQuestions')->findOrFail($assessmentId);

    return response()->json([
        'assessment' => $assessment,
        'questions' => $assessment->assessmentQuestions
    ]);
}

    public function destroy($id){
        $assessmentQuestion = AssessmentQuestion::findOrFail($id);

        $assessmentQuestion ->delete();

        return response()->json([
            'Message'=>'Record deleted Successfully!!'
        ]);
    }

}
