<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;


class ProjectTasksController extends Controller
{
	public function store(Project $project)
	{	
		$project->addTask(request()->validate(['description' => 'required']));
		// Task::create([
		// 	'project_id' => $project->id,
		// 	'description' => request('description')
		// ]);
		return back();
	}
    public function update(Task $task)
    {
    	$method = request()->has('completed') ? 'complete' : 'incomplete';
    	// if(request()->has('completed'))
    	// {
    	// 	$task->complete();
    	// }
    	// else
    	// {
    	// 	$task->incomplete();
    	// }
    	$task->$method();
    	// $task->update([
    	// 	'completed' => request()->has('completed')
    	// ]);
    	return back(); 
    }
}
