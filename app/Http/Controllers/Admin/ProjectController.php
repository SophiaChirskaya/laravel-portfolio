<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();


        return view("projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();

        $newProject->title = $data['title'];
        $newProject->content = $data['content'];
        $newProject->type_id = $data['type_id'];
        

        if(array_key_exists("image", $data)) {
            $img_url = Storage::putFile("projects", $data['image']);
            $newProject->image = $img_url;
        }

        $newProject->save();

        if($request->has('technologies')) {

            $newProject->technologies()->attach($data['technologies']);

        }

        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        
        return view("projects.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->title = $data['title'];
        $project->content = $data['content'];
        $project->type_id = $data['type_id'];

        if(array_key_exists("image", $data)) {

            Storage::delete($project->image);

            $img_url = Storage::putFile("projects", $data['image']);

            $project->image = $img_url;
        }
        

    

        $project->update();

        if($request->has('technologies')) {

            $project->technologies()->sync($data['technologies']);

        } else {

            $project->technologies()->detach();
        }

        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->image) {
            Storage::delete($project->image);
        }

        $project->delete();
        return redirect()->route("projects.index");
    }
}
