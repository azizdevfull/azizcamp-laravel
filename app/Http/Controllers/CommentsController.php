<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\ElasticaHandler;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        if(Auth::check()){
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if($validator->fails()){
                return redirect()->back();
            }

            $discussion = Discussion::where('id', $request->discussion_id)->first();

            if($discussion){
                Comment::create([
                    'discussion_id' => $discussion->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back();
            
            }
            else{
                return redirect()->back();
            }
        }
        else{
           return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        
        if (Auth::check()) {
            $comment = Comment::where('id',$request->comment_id)
                        ->where('user_id',Auth::user()->id)
                        ->first();
            
                        if ($comment) {
                            $comment->delete();

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
