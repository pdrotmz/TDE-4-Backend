<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task) {
            return response()->json($task);
        } else {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->update($request->all());
            return response()->json($task);
        } else {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(['message' => 'Task deleted']);
        } else {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }
}
