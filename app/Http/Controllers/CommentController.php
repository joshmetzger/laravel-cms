<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    //
    public function index(){

        $comments = Comment::all();

        // $comments = auth()->user()->comments()->paginate(5);

        return view('admin.comments.index', ['comments'=>$comments]);
    }

    public function store(Request $request){

        Comment::create([
            'post_id'=>request('post_id'),
            'author'=>request('author'),
            'email'=>request('email'),
            'body'=>request('body'),
        ]);

        Session::flash('comment-created-message', 'Comment was added successfully.');

        return back();
    }

    public function update(Request $request, Comment $comment){

        $comment->is_active = request('is_active');

        $comment->save();
        
        return back();
    }

    // public function showPostComments(Comment $comment, Post $post){

    //     $comments = Comment::all();
    //     $posts = Post::all();

    //     return view('admin.comments.post-comments', ['posts'=>$posts]);
    // }

    public function showPostComments($id){

        $post = Post::findOrFail($id);

        $comments = $post->comments;

        return view('admin.comments.post-comments', ['comments'=>$comments]);
    }

    public function destroy(Comment $comment){

        // $this->authorize('delete', $comment);
        
        $comment->delete();

        return back();
    }

}