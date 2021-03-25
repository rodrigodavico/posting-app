<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->only('store', 'destroy');
    }

    public function index() {        
        // gets all posts.
        //$posts = Post::get();
        $posts = Post::orderBy('created_at', 'desc')->orderBy('user_id', 'desc')->with(['user', 'likes'])->paginate(20);

        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request) {
        // validate
        $this->validate($request, [
            'body' => 'required'
        ]);

        // store in db, load Post class from elocuent relation.
        auth()->user()->posts()->create([
            'body' => $request->body
        ]);

        // return back
        return back();
    }

    // show sinlge post.
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    // delete post
    public function destroy(Post $post) {
        $this->authorize('delete', $post);

        $post->delete();
        
        return back();
    }
}
