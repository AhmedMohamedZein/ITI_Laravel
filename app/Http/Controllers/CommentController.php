<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store (Request $request) {

        $post = Post::find($request->post_id);
        $post->comments()->create([
            'message' => $request->comment 
        ]);

        return redirect()->route('posts.show',$request->post_id);
    }

    public function destroy (Request $request , $id) { // id is comment id 
        Comment::where('id' , $id)->delete();
        return redirect()->route('posts.show',$request->post_id);
    }
}
