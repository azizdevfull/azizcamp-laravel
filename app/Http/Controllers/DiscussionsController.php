<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Facades\View;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

// use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);

        $discussions = Discussion::where('project_id',$project->id)->get();
        
        return view('discussions.index', compact('project','discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return View::make('discussions.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        // $file = $request->file;
        // $filename = time().'_'.$file->getClientOriginalName();
        $discussion = new Discussion();
        $discussion->title = $request->title;
        $discussion->description = $request->description;
        $discussion->project_id = $project->id;
        $discussion->save();

        // Attacher::create($request->all() + ['project_id' => $project->id]);
        return redirect()->route('discussions.show',$discussion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discussion = Discussion::find($id);
        if($discussion){
            $projects = Project::all();
            $discussions = $discussion->comments()->orderBy('created_at','desc')->get();;
            return view('discussions.show',compact('discussion','discussions', 'projects'));
        }
        else{
            return redirect()->route('projects.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discussion = Discussion::find($id);
        $project = $discussion->project_id;
        return view('discussions.edit', compact('discussion','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $discussion = Discussion::find($id);
        $discussion->title = $request->title;
        $discussion->description = $request->description;
        $discussion->save();
        return redirect()->route('discussions.show',$discussion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discussion = Discussion::find($id);
        $project = $discussion->project_id;
        $discussion->delete();
        return redirect()->route('projects.discussions.index',$project);
    }
}
