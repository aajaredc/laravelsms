<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function upload(Request $request)
    {
      request()->validate([
        'image' => 'required',
        'tags' => 'required',
      ]);

      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $original = $image->getClientOriginalName();

      $path = $image->store('/public/posts');
      $path = str_replace('public', 'storage', $path);

      $post = new Post();
      $post->user_id = Auth::user()->id;
      $post->original_name = $original;
      $post->tags = $request->input('tags');
      $post->path = $path;
      $post->save();
    }
}
