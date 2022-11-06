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
        // $message = [
        //     'requred' => 'Please Select File',
        // ];
        // $this->validate($request, [
        //     'file' => 'required',
        // ], $message);

        // foreach ($request->file as $file) {
        //     $filename = time().'_'.$file->getClientOriginalName();
        //     $filesize = $file->getSize();
        //     $file->storeAs('public/', $filename);
        //     $filemodel = new Attacher;
        //     $filemodel->name = $filename;
        //     $filemodel->file = 'storage/'.$filename;
        //     $filemodel->project_id = $project->id;
        //     $filemodel->save();
        // }
        $file = $request->file;
        $filename = time().'_'.$file->getClientOriginalName();
        $attacher = new Attacher;
        $attacher->name = $request->name;
        $request->file->move('attachment',$filename);
        $attacher->file = $filename;
        $attacher->project_id = $project->id;
        $attacher->save();

        // Attacher::create($request->all() + ['project_id' => $project->id]);
        return redirect()->route('projects.attachers.index', $project->id);

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
        $request->validate([
            'name' => 'required'
            ]);
            
            $input = $request->all();
            
            if ($image = $request->file('file')) {
            $destinationPath = 'attachment/';
            $profileImage = time().'_'.$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
            }else{
            unset($input['file']);
            }
            
            $attacher->update($input);

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
