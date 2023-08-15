<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json(['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        return response()->json(['tag' => $tag], 201);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return response()->json(['message' => 'Tag updated successfully']);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
    public function addTags(Request $request, Post $post)
{
    $tags = $request->input('tags');
    $post->tags()->sync($tags);
    return response()->json(['message' => 'Tags associated successfully']);
}

}
