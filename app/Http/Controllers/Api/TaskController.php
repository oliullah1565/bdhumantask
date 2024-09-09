<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;


class TaskController extends Controller
{
    public function index() {
        return Task::all();
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date'
        ]);
    
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }
    
    public function show(Task $task) {
        return $task;
    }
    
    public function update(Request $request, Task $task) {
        $task->update($request->all());
        return response()->json($task);
    }
    
    public function destroy(Task $task) {
        $task->delete();
        return response()->json(null, 204);
    }
    
}
