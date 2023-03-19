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
        
        $selectedPost = NULL ;


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

    
    public function destroy ($id) {
        
        return redirect()->route('posts.index');
    }

    public function edit ($id) {
        
        return view ('post.edit', ['id' => $id]);

    }

    public function update () {
        
        return redirect()->route('posts.index' );

    }
}
