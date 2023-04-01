<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show ($id) {
        $post = Post::find($id);
        if ( !empty($post) ) {
            return new PostResource($post);
        }
        else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
    public function store (StorePostRequest $request) {

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' =>  $request->content,
            'user_id' => $request->user_id
        ]);

        if (isset($request['img_src'])) {
            $post->img_src = $request['img_src'];
        }

        return new PostResource($post);
    }
    public function update ($id  , UpdatePostRequest $request) {
        $post = Post::find($id);
        if ( !empty($post) ) {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' =>  $request->content
            ]);
            return new PostResource($post);
        }else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy ($id) {
        $post = Post::find($id);
        if ( !empty($post) ) {
            $post->delete();
            return response()->json(['message' => 'Deleted'], 200);
        }else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}
