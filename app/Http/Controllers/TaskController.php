<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $tasks = Task::query();
    
        // Filter by status
        if ($request->filled('status')) {
            $tasks->where('status', $request->status);
        }
    
        // Sort by due date
        if ($request->filled('sort') && $request->sort === 'due_date') {
            $tasks->orderBy('due_date');
        }
    
        $tasks = $tasks->get();
        return view('tasks.index', compact('tasks'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date'
        ]);
    
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);
    
        // Update the task with the new data
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);
    
        // Redirect back to the task list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
