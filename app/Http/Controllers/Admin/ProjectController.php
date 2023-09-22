<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
        ]);
    
        
        
        $project = new Project();
        $project->title = $validatedData['title'];
        $project->slug = $validatedData['slug'];
        $project->content = $validatedData['content'];
    
        
        $project->save();
    
        
        return redirect()->route('admin.projects', ['id' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        // dd($project);
        $project = Project::findOrFail($id);
        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
        ]);
    
        $project = Project::findOrFail($id);
        $project->title = $validatedData['title'];
        $project->slug = $validatedData['slug'];
        $project->content = $validatedData['content'];
        $project->save();
    
        return redirect()->route('admin.projects', ['id' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
    
        return redirect()->route('admin.projects');
    }
}
