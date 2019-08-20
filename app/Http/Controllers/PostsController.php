<?php

namespace App\Http\Controllers;

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

      $path = $image->store('/public/posts');
    }
}
