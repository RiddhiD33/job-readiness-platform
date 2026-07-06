<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CareerPathController;
use App\Http\Controllers\Api\StudentProfileController;
use App\Http\Controllers\Api\InternshipController;
use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\AssessmentQuestionController;
use App\Http\Controllers\Api\AssessmentAttemptController;
use App\Http\Controllers\Api\AssessmentAttemptAnswerController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

Route::middleware(['auth:sanctum','role:student'])->group(function (){

Route::get('/projects',[ProjectController::class,'index']);
Route::get('/projects/{id}',[ProjectController::class,'show']);
Route::post('/projects',[ProjectController::class,'store']);
Route::put('/projects/{id}',[ProjectController::class,'update']);
Route::delete('/projects/{id}',[ProjectController::class,'destroy']);
Route::get('/student-profile',[StudentProfileController::class,'show']);
Route::post('/student-profile',[StudentProfileController::class,'store']);
Route::put('/student-profile', [StudentProfileController::class, 'update']);
Route::delete('/student-profile',[StudentProfileController::class,'destroy']);
Route::post('/internships',[InternshipController::class,'store']);
Route::put('/internships/{id}',[InternshipController::class,'update']);
Route::delete('/internships/{id}',[InternshipController::class,'destroy']);
Route::get('/assessment-questions',[AssessmentQuestionController::class,'index']);
Route::get('/assessment-questions/{id}',[AssessmentQuestionController::class,'show']);
Route::post('/assessment-questions',[AssessmentQuestionController::class,'store']);
Route::put('/assessment-questions/{id}',[AssessmentQuestionController::class,'update']);
Route::delete('/assessment-questions/{id}',[AssessmentQuestionController::class,'destroy']);
Route::get('/assessment-attempts',[AssessmentAttemptController::class,'index']);
Route::get('/assessment-attempts/{id}',[AssessmentAttemptController::class,'show']);
Route::post('/assessment-attempts',[AssessmentAttemptController::class,'store']);
Route::put('/assessment-attempts/{id}',[AssessmentAttemptController::class,'update']);
Route::delete('/assessment-attempts/{id}',[AssessmentAttemptController::class,'destroy']);
Route::get('/assessment-attempt-answers',[AssessmentAttemptAnswerController::class,'index']);
Route::get('/assessment-attempt-answers/{id}',[AssessmentAttemptAnswerController::class,'show']);
Route::post('/assessment-attempt-answers',[AssessmentAttemptAnswerController::class,'store']);
Route::put('/assessment-attempt-answers/{id}',[AssessmentAttemptAnswerController::class,'update']);
Route::delete('/assessment-attempt-answers/{id}',[AssessmentAttemptAnswerController::class,'destroy']);
Route::post('/logout', [AuthController::class, 'logout']);

});



Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return 'HELLO FROM API';
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/career-paths',[CareerPathController::class,'index']);
Route::get('/internships',[InternshipController::class,'index']);
Route::get('/internships/{id}',[InternshipController::class,'show']);
Route::get('/assessments',[AssessmentController::class,'index']);
Route::get('/assessments/{id}',[AssessmentController::class,'show']);



