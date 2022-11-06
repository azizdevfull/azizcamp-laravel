<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\attacher;
// use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class AttachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
        $attachers = $project->attachers;
        return view('attachers.index',compact('attachers','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        // $project = Project::find($project);
        // return view('attachers.create', compact('project'));
        return View::make('attachers.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {

        Attacher::create($request->all() + ['project_id' => $project->id]);
        return redirect()->route('projects.attachers.index', $project->id);
        // $project = Project::find($id);
        // $attacher = new $project->attachers();
        // $attacher->project_id = $project->id;
        // $attacher->name = $request->name;

        // $project->attachers()->save($attacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id, Attacher $attacher)
    {
        return view('attachers.show', compact('project_id', 'attacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, Attacher $attacher)
    {
        return view('attachers.edit', compact('project_id', 'attacher'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($project_id, Request $request, Attacher $attacher)
    {
        $attacher->update($request->all());
        return redirect()->route('projects.attachers.index', $project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id, Attacher $attacher)
    {
        $attacher->delete();
        return redirect()->back();
    }
}
