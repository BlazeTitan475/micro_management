<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    // Store a new task
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'required|string',
            'task_priority' => 'required|in:low,medium,high',
            'task_deadline' => 'required|date',
        ]);

        // Create the new task
        logger('111111111111  ' . $request->task_deadline);
        $task = Task::create([
            'task_name' => $validated['task_name'],
            'task_description' => $validated['task_description'],
            'task_priority' => $validated['task_priority'],
            'task_deadline' => $validated['task_deadline'],
            'operator_id' => Session::get('operator_id'), // Retrieve the operator_id from session
            'project_id' => $request->project_id, // Assuming project_id is passed in the request
        ]);
        ProjectController::updateProjectDeadline($task->project->id);
        // Return response (you can adjust this for your needs)
        return redirect()->back()->with('success', 'Task created successfully!');
    }

    public function complete($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->status = 'completed';
        $task->save();
        //   /      $task->update(['status' => 'Completed']);
        return response()->json(['message' => 'Task marked as completed!' . Task::where('id', $taskId)->first()->status]);
    }

    public function pause($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->status = $task->status == 'pending_client' ? 'in_progress' : 'pending_client';
        $task->save();
        $message = $task->status == 'Paused' ? 'Task paused!' : 'Task resumed!';
        return response()->json(['message' => $message, 'status' => $task->status]);
    }

    public function cancel($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->status = 'cancelled';
        $task->save();
        return response()->json(['message' => 'Task canceled!', 'status' => $task->status]);
    }
}