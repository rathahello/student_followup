<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Comment;
use Auth;

class commentController extends Controller
{
    public function addcomment(Request $request, $id){
        $students = Student::find($id);
        $user = User::find(Auth::id());
        $comment = new Comment;
        $comment->comment = $request->get('comment');
        $comment->user_id = $user->id;
        $comment->student_id = $students->id;
        $comment->save();
        return back();
    }
    public function delete($id){
        $user_id = Auth::id();
        $comment = Comment::where('id', $id)->where('user_id',$user_id)->first();
        if(!is_null($comment)){
            $comment->delete();
        }
        return back();
    }

    public function updateComment(Request $request, $id){
        $comment = Comment::find($id);
        $comment->comment = $request->get('comment');
        $comment->save();
        return back();
    }

    
}
