<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerPath;

class CareerPathController extends Controller
{
    public function index(){
        $careerPaths = CareerPath::all();
        return response()->json($careerPaths);
    }
}
