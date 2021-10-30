<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;


class AdminsController extends Controller
{
    //

    public function index() {

        $postCount = Post::count();

        $commentCount = Comment::count();

        $replyCount = Reply::count();

        return view('admin.index', ['postCount'=>$postCount, 'commentCount'=>$commentCount, 'replyCount'=>$replyCount]);

    }
}
