<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
        $tasks = Task::where('project_id',$project->id)->get();
        return view('tasks.index', compact('tasks','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {

        $task = new Task;
        $task->body = $request->body;
        $task->project_id = $project->id;
        $task->user_id = Auth::user()->id;
        
        $task->save();

        return redirect()->route('projects.tasks.index', $project->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, Task $task)
    {
        return view('tasks.edit', compact('project_id', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($project_id, Request $request, Task $task)
    {
        $request->validate([
            'body' => 'required'
            ]);
            
            $input = $request->all();
            
            // if ($image = $request->file('file')) {
            // $destinationPath = 'attachment/';
            // $profileImage = time().'_'.$image->getClientOriginalName();
            // $image->move($destinationPath, $profileImage);
            // $input['file'] = "$profileImage";
            // }else{
            // unset($input['file']);
            // }
            
            $task->update($input);

        return redirect()->route('projects.tasks.index', $project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        if (Auth::check()) {
            $task = Task::where('id',$request->task_id)
                        ->where('user_id',Auth::user()->id)
                        ->first();
            
                        if ($task) {
                            $task->delete();

                            return response()->json([
                                'status' => 200,
                                'message' => 'Comment Deleted Successfully'
                            ]);
                        }
                        else
                        {
                            return response()->json([
                                'status' => 500,
                                'message' => 'Something Went Wrong'
                            ]);
                        }

        }
        else    
        {
            return response()->json([
                'status' => 401,
                'message' => 'You are not allowed to delete this comment'
            ]);
        }
        
    }
}
