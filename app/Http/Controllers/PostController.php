<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply; 
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){

        $posts = auth()->user()->posts()->paginate(10);

        return view('admin.posts.index', ['posts'=> $posts]);
    }


    public function show($id){

        $post = Post::findOrFail($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        // $comment = Comment::findOrFail($id);

        // $replies = $comment->replies()->whereIsActive(1)->get();

        return view('blog-post', compact('post', 'comments'));
    }

    public function create(){

        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }

    public function store(){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'file',
            'body'=> 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('post-created-message', 'Post titled: ' . $inputs['title'] . ' -was created');

        return redirect()->route('post.index');
    }

    public function edit(Post $post){

        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post'=> $post]);
    }

    public function update(Post $post){
        
        $inputs = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'file',
            'body'=> 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        $this->authorize('update', $post);

        $post->save();

        Session::flash('post-updated-message', 'Post updated');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);
        
        $post->delete();

        Session::flash('message', 'Post was deleted');

        return back();
    }
}
