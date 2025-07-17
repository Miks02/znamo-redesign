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
            'projectTitle.required' => 'Naslov projekta je obavezno polje!',
            'yearOfCreation.required' => 'Godina izrade projekta je obavezno polje!',
            'yearOfCreation.integer' => 'Nevalidan format godine izrade!',
            'yearOfRedesign.integer' => 'Nevalidan format godine redizajna!',
            'projectLink.required' => 'Link projekta je obavezno polje!',
            'status.required' => 'Status projekta ne sme biti prazan!',
        ];

        try {
            $data = $request->validate([
                'projectTitle' => ['required', 'string'],
                'yearOfCreation' => ['required', 'integer'],
                'yearOfRedesign' => ['integer'],
                'projectLink' => ['required', 'string'],
                'status' => ['required', 'boolean']
            ], $messages);

            $project = Project::create([
                'title' => $data['projectTitle'],
                'year_of_creation' => $data['yearOfCreation'],
                'year_of_redesign' => $data['yearOfRedesign'],
                'project_link' => $data['projectLink'],
                'active_updating' => $data['isUpdating'],
                'image_path'=> $data['imagePath'],
                'status' => $data['status'],
                'user_id' => auth()->user()->id
            ]);

            return response()->json(['message', 'Projekat je uspešno dodat ', 'Projekat: ' => $project]);

        } catch(ValidationException $e) {
            return response()->json(['errors' => $e->errors()],0);
        }

    }
}
