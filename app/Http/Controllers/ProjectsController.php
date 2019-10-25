<?php
//pull in the projects from the projects table in the tutorial database and display them.
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Project;
//use PHPUnit\Util\Filesystem;
use Illuminate\Filesystem\Filesystem;
use App\Services;
use App\Events\ProjectCreated;
//use Illuminate\Support\Facades\Mail;


class ProjectsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        //$projects = \App\Project::all();

        //auth functions
        //auth()->id() returns user id
        //auth()->user() returns user instance
        //auth()->check() returns boolean, whether or not they are signed in

       // $projects = Project::where('owner_id', auth()->id())->get();
        $projects = auth()->user()->projects;

        //var dump
        //dump($projects);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    //public function show(Project $project)  //laravel route model binding
    public function show(Project $project)
    {

        //  $twitter = app('twitter');
        //  dd($twitter);

        // $project = Project::findOrFail($id);

        //Ways to deny/allow permissions for users to view authorized projects
       // abort_if($project->owner_id !== auth()->id(), 403);
        $this->authorize('view', $project);
        /*if (\Gate::denies('update', $project)) {
            abort(403);
        }*/

        return view('projects.show', compact('project'));


    }

    public function edit(Project $project)
    {

        //$project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));


    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);
        $project->update(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5']
        ]));

        return redirect('/projects/');

    }

    public function destroy(Project $project)
    {

        $project->delete();

        return redirect('/projects');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5']
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        event(new ProjectCreated($project));
        /*  $project = new Project();

          $project->title = request('title');
          $project->description = request('description');

          $project->save();*/

        return redirect('/projects');
    }


}
