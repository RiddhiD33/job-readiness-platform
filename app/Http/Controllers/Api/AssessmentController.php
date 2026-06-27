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
}
