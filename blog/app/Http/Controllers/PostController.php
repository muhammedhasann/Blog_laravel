<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;



class PostController extends Controller
{
  public function index()
    {
        $user = auth()->user();
        $posts = $user->posts;
        return response()->json(['posts' => $posts]);
    }

            public function store(Request $request)
            {
                $user = auth()->user();
                $post = $user->posts()->create($request->all());
                return response()->json(['post' => $post], 201);
            }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json(['message' => 'Post updated successfully']);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
