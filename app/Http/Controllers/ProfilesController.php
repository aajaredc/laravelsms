<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostRating;
use App\PostComments;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show($username)
    {
      $user = User::where('username', $username)->first();

      return view('profile', compact('user'));
    }
}
