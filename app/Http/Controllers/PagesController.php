<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function board()
    {
      $posts = \App\Post::all();

      return view('board', [
        'posts' => $posts
      ]);
    }

    public function newpost() {
      return view('newpost');
    }

    public function contact()
    {
      return view('contact');
    }

    public function blade()
    {
      return view('blade');
    }
}
