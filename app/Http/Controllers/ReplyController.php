<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Session;


class ReplyController extends Controller
{
    //
    public function store(Request $request){

        Comment::create([
            'comment_id'=>request('comment_id'),
            'author'=>request('author'),
            'email'=>request('email'),
            'body'=>request('body'),
        ]);

        Session::flash('reply-created-message', 'Reply was submitted and awaiting moderation.');

        return back();
    }
}
