<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() { }

    public function index () {
        
        $allPosts = Post::all();
        return view('post.index',['posts' => $allPosts]);
    }

    public function show ($id) { 
        
        $selectedPost = Post::find($id);
        return view('post.show' , ['post' => $selectedPost]);
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

    
    public function destroy (Request $request , $id) {
        
        Post::where('id' , $id)->delete();

        return redirect()->route('posts.index');
    }

    public function edit ($id) {
        
        return view ('post.edit', ['id' => $id]);

    }

    public function update (Request $request,$id) {

        $title = $request->title ;
        $description =  $request->description;
        $content = $request->content;

        Post::where('id' , $id)->update([
            'title' => $title ,
            'description' => $description,
            'content' => $content
        ]);

        return redirect()->route('posts.index' );
    }
}
