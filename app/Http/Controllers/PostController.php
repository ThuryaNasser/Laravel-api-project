<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResources;
use App\Http\Resources\ResponseWithMessage;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResources::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        return new ResponseWithMessage($post, 'Post Created successfully!');
    }

    public function show(int $id)
    {
        $post = Post::findOrfail($id);
        return new PostResources($post);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return new ResponseWithMessage($post, 'Post Updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => "Post Deleted successfully!",
        ], Response::HTTP_OK);
    }
}
