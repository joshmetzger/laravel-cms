<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function index(){

        $comments = Comment::all();

        return view('admin.comments.index', ['comments'=>$comments]);
    }

    public function store(Request $request){

        // $inputs = request()->validate([
        //     'post_id'=>'required',
        //     'author'=>'required|min:8|max:255',
        //     'email'=>'required',
        //     'body'=> 'required'
        // ]);

        Comment::create([
            'post_id'=>request('post_id'),
            'author'=>request('author'),
            'email'=>request('email'),
            'body'=>request('body'),
        ]);

        // Comment::create($inputs->all());

        return back();
    }

}
