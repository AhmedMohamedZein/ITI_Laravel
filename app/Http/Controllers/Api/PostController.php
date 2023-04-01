<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show ($id) { //Model Pinding
        $post = Post::find($id);
        if ( !empty($post) ) {
            return new PostResource($post);
        }
        else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function update ($id , UpdatePostRequest $request) {

        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' =>  $request->content
        ]);
    }
}
