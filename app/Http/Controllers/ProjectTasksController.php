<?php

//next, create a New Task button.

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    //

    public function update(Task $task)
    {
        $task->complete(request()->has('completed'));

        /*$task->update([

            'completed' => request()->has('completed')

        ]);*/

        return back();
    }

    public function store(Project $project)
    {

        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes);

        return back();

        /*Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);*/

        //$project->addTask(request('description'), $project->id);

    }
}

