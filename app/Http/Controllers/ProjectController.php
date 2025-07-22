<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function addProject(Request $request)
    {
        $messages = [
            'title.required' => 'Naslov projekta je obavezno polje!',
            'year_of_creation.required' => 'Godina izrade projekta je obavezno polje!',
            'year_of_creation.integer' => 'Nevalidan format godine izrade!',
            'year_of_redesign.integer' => 'Nevalidan format godine redizajna!',
            'project_link.required' => 'Link projekta je obavezno polje!',
            'status.required' => 'Status projekta ne sme biti prazan!',
        ];

        try {
            $data = $request->validate([
                'title' => ['required', 'string'],
                'year_of_creation' => ['required', 'integer'],
                'year_of_redesign' => ['nullable', 'integer'],
                'project_link' => ['required', 'string'],
                'status' => ['required', 'string'],
                'is_updating' => ['required', 'boolean'],
                'image' => ['nullable', 'image', 'max:2048'],
            ], $messages);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('project_images', 'public');
            }


            $project = Project::create([
                'title' => $data['title'],
                'year_of_creation' => $data['year_of_creation'],
                'year_of_redesign' => $data['year_of_redesign'] ?? null,
                'project_link' => $data['project_link'],
                'active_updating' => $data['is_updating'],
                'image_path' => $imagePath,
                'status' => $data['status'],
                'user_id' => auth()->id()
            ]);

            return response()->json(['message' => 'Projekat je uspešno dodat ', 'Projekat: ' => $project]);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 0);
        }

    }

    public function getAllProjects()
    {
        $projects = Project::all();

        return response()->json($projects);
    }

    public function getProjectById($id)
    {
        $project = Project::find($id);
        if (!$project)
            return response()->json(['errors' => 'Došlo je do greške, projekat nije pronadjen...'], 404);

        return response()->json($project);
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
            return response()->json(['message' => 'Projekat je uspešno obrisan'], 200);
        }

        return response()->json(['errors' => 'Došlo je do greške, projekat nije pronadjen...'], 404);
    }

    public function updatePatchProject($id, Request $request)
    {
        $project = Project::find($id);
        if (!$project)
            return response()->json(['errors' => ('Projekat nije pronadjen!')], 404);


               
        $data = $request->validate([
            'title' => ['nullable', 'string'],
            'year_of_creation' => ['nullable', 'integer'],
            'year_of_redesign' => ['nullable', 'integer'],
            'project_link' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'is_updating' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

       

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
        }


        $project->title = $data['title'] ?? $project->title;
        $project->year_of_creation = $data['year_of_creation'] ?? $project->year_of_creation;
        $project->year_of_redesign = $data['year_of_redesign'] ?? null;
        $project->project_link = $data['project_link'] ?? $project->project_link;
        $project->status = $data['status'] ?? $project->status;
        $project->image_path = $imagePath;
    
        $project->save();


        return response()->json(['message'=> ['Projekat je ažuriran uspešno!'],'projekat:'=> $project]);

    }

}
