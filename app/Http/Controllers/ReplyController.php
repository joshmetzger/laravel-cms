<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class ReplyController extends Controller
{
    //
    public function store(Request $request){

        $user = auth()->user();

        Reply::create([
            'comment_id'=>request('comment_id'),
            'author'=> $user->name,
            'email'=> $user->email,
            'body'=>request('body'),
        ]);

        Session::flash('reply-created-message', 'Reply was submitted and awaiting moderation.');

        return back();

    }
}
