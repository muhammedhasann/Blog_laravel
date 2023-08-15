<?php

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image; // Add this line to import the Image model
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category', 'tags'])->get();
        return response()->json(['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return response()->json(['post' => $post->load(['user', 'category', 'tags', 'images'])]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $post = $user->posts()->create($request->all());

        if ($request->has('image_url')) {
            $imageUrl = $request->input('image_url');
            $post->images()->create(['path' => $imageUrl]);
        }

        return response()->json(['post' => $post], 201);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        if ($request->has('image_url')) {
            $imageUrl = $request->input('image_url');
            $post->images()->delete();
            $post->images()->create(['path' => $imageUrl]);
        }

        return response()->json(['message' => 'Post updated successfully']);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
