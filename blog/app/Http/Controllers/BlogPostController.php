<?php

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['user', 'category', 'tags'])->get();
        return response()->json(['posts' => $posts]);

        $query = Post::with(['user', 'category', 'tags']);

                   // Search by title, category, and tag
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function ($query) use ($searchTerm) {
                      $query->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('tags', function ($query) use ($searchTerm) {
                      $query->where('name', 'like', '%' . $searchTerm . '%');
                  });
        }

        // Pagination
        $perPage = $request->input('per_page', 10);
        $posts = $query->paginate($perPage);

        return response()->json(['posts' => $posts]);

    }

    public function show(Post $post)
    {
        return response()->json(['post' => $post->load(['user', 'category', 'tags', 'images'])]);
    }

    public function store(Request $request)
    {


          $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',    ]);


        if ($request->has('image_url')) {
            $imageUrl = $request->input('image_url');
            $post->images()->create(['path' => $imageUrl]);
        }

        $user = auth()->user();
        $post = $user->posts()->create($request->all());
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

           $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

        return response()->json(['message' => 'Post updated successfully']);
    }

    public function destroy(Post $post)
    {
        
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}

