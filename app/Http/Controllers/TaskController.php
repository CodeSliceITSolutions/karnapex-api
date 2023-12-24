<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Task;
use App\Models\TaskAchievement;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function getTaskList(Request $request) {
        try {
            $userId = $request->input('user_id'); // Get user_id from request, adjust as needed

            $tasksWithStatus = DB::table('tasks')
            ->leftJoin('task_achievements', function ($join) use ($userId) {
                $join->on('tasks.id', '=', 'task_achievements.tasks_id')
                    ->where('task_achievements.user_id', '=', $userId);
            })
            ->select(
                'tasks.id',
                'tasks.title',
                'tasks.description',
                'tasks.url',
                DB::raw('IF(task_achievements.user_id IS NULL, 0, 1) AS status'),
                'tasks.created_at',
                'tasks.updated_at'
            )
            ->orderBy('tasks.id', 'asc')
            ->get();

            return response([
                'error' => false,
                'message'=> 'Task list fetched successfully.',  
                'data' =>  $tasksWithStatus
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'message'=>$th->getMessage()
            ], 500);
        } 
    }

    public function saveTask(Request $request) {
        try {
            $data = $request->only(['tasks_id', 'user_id', 'email_id', 'display_name', 'user_photo']);

            // Check if the task achievement already exists for this user and task
            $existingAchievement = TaskAchievement::where('tasks_id', $data['tasks_id'])
                ->where('user_id', $data['user_id'])
                ->first();

            if ($existingAchievement) {
                return response([
                    'error' => true,
                    'message' => 'Task achievement already exists for this user.'
                ], 400);
            }

            // If no existing record, proceed to create the new task achievement
            $taskAchievement = TaskAchievement::create([
                'tasks_id' => $data['tasks_id'],
                'user_id' => $data['user_id'],
                'email_id' => $data['email_id'],
                'display_name' => $data['display_name'],
                'user_photo' => $data['user_photo'],
            ]);

            return response([
                'error' => false,
                'message'=> 'Task saved successfully.'
            ], 202);
        } catch (\Throwable $th) {
            return response([
                'message'=>$th->getMessage()
            ], 500);
        } 
    }
}
