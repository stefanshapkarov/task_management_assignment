<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = Project::query();

        if ($request->has('due_date')) {
            $filter->where('due_date', $request->due_date);
        }

        return ProjectResource::collection($filter->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'due_date' => 'required|date',
            ]);
            
            $project = Project::create($validatedData);

            return response()->json([
                'message' => 'Project created successfully',
                'project' => ProjectResource::make($project)
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error creating project',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
