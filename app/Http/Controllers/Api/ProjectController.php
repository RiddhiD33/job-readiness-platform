<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return response()->json($projects);
    }

    public function show($id){
        $project = Project::with(['studentProfile','skills'])->findOrFail($id);
        return response()->json($project);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_profile_id'=>'required|exists:student_profiles,id',
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'project_type'=>'required|in:personal,academic,company,freelance',
            'github_link'=>'nullable|url',
            'demo_link'=>'nullable|url',
            'status'=>'required|in:draft,published',
        ]);

        $project=Project::create($validated);

        return response()->json($project,201);
    }

    public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $validated = $request->validate([
        'title' => 'sometimes|string|max:255',
        'description' => 'sometimes|string',
        'project_type' => 'sometimes|in:personal,academic,company,freelance',
        'github_link' => 'sometimes|nullable|url',
        'demo_link' => 'sometimes|nullable|url',
        'status' => 'sometimes|in:draft,published',
    ]);

    $project->update($validated);

    return response()->json($project);
}

  public function destroy($id)
{
    $project = Project::findOrFail($id);

    $project->delete();

    return response()->json([
        'message' => 'Project deleted successfully'
    ]);
}


}
