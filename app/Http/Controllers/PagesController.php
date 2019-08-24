<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostRating;
use App\User;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function board()
    {
      $users = User::all();
      $posts = Post::paginate(1);

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
