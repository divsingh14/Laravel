<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Project;
use App\Mail\ProjectCreated;

class PagesController extends Controller
{
   public function __construct()
   {  
      $this->middleware('auth');
   }
   	public function index()
   	{	
         // $project = auth()->user()->projects;
   		// $projects = Project::where('owner_id', auth()->id())->get();	
         
   		return view('Project.index',[
            'projects' => auth()->user()->projects
         ]);
   	}
   	public function create()
   	{	
   		return view('Project.create');
   	}
   	public function edit(Project $project)
   	{
   		// $project = Project::findOrFail($id);																//	video 14
   		return view('Project.edit',compact('project'));
   	}
   	public function destroy(Project $project)
   	{
   		$project->delete();
   		return redirect('/projects');
   	}
   	public function update(Project $project)
   	{
   		// $project = Project::findOrFail($id);
   		Project::create($this->validateProject());	

   		// $project->title = request('title');       
   		// $project->description = request('description');
   		// $project->save();

   		return redirect('/projects');
   	}
   	public function show(Project $project)
   	{ 
         // abort_unless(\Gate::allows('update',$project),403);
         // $this->authorize('update',$project);
         // abort_unless(auth()->user()->owns($project),403);
         // abort_if($project->owner_id !== auth()->id(), 403);
   		// $project = Project::findOrFail($id);                                    
   		return view('Project.show',compact('project'));
   	}
   	public function store()
   	{	
         $attributes = $this->validateProject();
   		$attributes['owner_id'] = auth()->id();
         // Project::create($attributes);
   		$project = Project::create($attributes);	

         event(new ProjectCreated($project));   
     //     Mail::to('divsingh14@yahoo.in')->send(
     //        new ProjectCreated($project)
     //     );
   		// $project = new Project();					//   video 14
   		// $project->title = request('title');
   		// $project->description = request('description');
   		// $project->save();
   		return redirect('/projects');
   	}

      protected function validateProject()
      {
         return request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:3']
         ]);
      }
}
