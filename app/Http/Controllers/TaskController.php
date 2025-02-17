<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = Task::query()->with('project');

        if ($request->has('status')) {
            $filter->where('status', $request->status);
        }

        if ($request->has('category_id')) {
            $filter->where('category_id', $request->category_id);
        }

        return TaskResource::collection($filter->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'project_id' => 'required|exists:projects,id',
                'category_id' => 'required|exists:categories,id',
            ]);

            $task = Task::create($validatedData);

            return response()->json([
                'message' => 'Task created successfully',
                'task' => TaskResource::make($task)
            ], 201);
        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Error creating task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Complete a task with given id
     */
    public function completeTask(string $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update(['status' => TaskStatus::COMPLETED]);

            return response()->json([
                'message' => 'Task marked as completed successfully',
                'task' => TaskResource::make($task)
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error completing task',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
