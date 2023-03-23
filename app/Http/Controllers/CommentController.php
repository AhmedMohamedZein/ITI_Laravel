<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store (Request $request) {

        $post = Post::find($request->post_id);
        $post->comments()->create([
            'message' => $request->post_id 
        ]);

        return redirect()->route('/posts/{'.$request->post_id.'}');
    }

    public function destroy ($id) {
        //delete Comment
    }
}
