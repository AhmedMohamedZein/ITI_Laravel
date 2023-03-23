<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function __construct() { }

    public function index () {

        $allPosts = Post::with('user')->simplePaginate(3);
        return view('post.index',['posts' => $allPosts]);
    }

    public function show ($post) {

        $selectedPost = Post::find($post);
        $comments =  $selectedPost->comments;
        return view('post.show' , ['post' => $selectedPost , 'comments' => $comments]);
    }


    public function create () {

        $allUsers = User::all();
        return view ('post.create',['users' => $allUsers]);
    }


    public function store (Request $request) {

        $title = $request->title ;
        $description =  $request->description;
        $content = $request->content;
        $postCreator = $request->input('postCreator');
        Post::create([
            'title' => $title ,
            'description' => $description,
            'content' => $content,
            'user_id' =>  $postCreator
        ]);

        return redirect()->route('posts.index');
    }


    public function destroy ($post) { // problem here
        Post::where('id' , $post)->delete();
        return redirect()->route('posts.index');
    }

    public function edit ($post) {

        return view ('post.edit', ['id' => $post]);

    }

    public function update (Request $request,$post) {

        $title = $request->title ;
        $description =  $request->description;
        $content = $request->content;

        Post::where('id' , $post)->update([
            'title' => $title ,
            'description' => $description,
            'content' => $content
        ]);

        return redirect()->route('posts.index');
    }
}
