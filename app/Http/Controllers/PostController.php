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

        $selectedPost = Post::findOrFail($post);
        $comments =  $selectedPost->comments;
        return view('post.show' , ['post' => $selectedPost , 'comments' => $comments]);
    }


    public function create () {

        $allUsers = User::all();
        return view ('post.create',['users' => $allUsers]);
    }


    public function store (Request $request) {

        $request->validate([
            'title' => ['required', 'min:3','unique:posts'],
            'description' => ['required' , 'min:10'],
            'content' => ['required']
        ]);

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


    public function destroy ($id) { // problem here
        
        $post = Post::where('id' , $id)->first(); 
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function edit ($post) {

        return view ('post.edit', ['id' => $post]);

    }

    public function update (Request $request,$id) {

        $post = Post::findOrFail($id); // will throw an exiption that will handel id of post creator that doesn’t exist in the database

        $validatedData = $request->validate([
            'description' => ['required' , 'min:10'],
            'content' => ['required']
        ]);
        
        if (!$request->filled('title')) {
            $validatedData['title'] = $post->title; // if the user didn't fill the filed title use the old one 
        }
       
        $post->update($validatedData); // insert the changes 

        return redirect()->route('posts.index');
    }
}
