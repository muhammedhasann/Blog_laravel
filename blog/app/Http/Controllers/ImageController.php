<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Image;


class ImageController extends Controller
{
  public function upload(Request $request)
    {
        $user = auth()->user();
        // Implement image upload logic and associate with user
        return response()->json(['message' => 'Image uploaded successfully']);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        // Implement image deletion logic
        return response()->json(['message' => 'Image deleted successfully']);
    }}
