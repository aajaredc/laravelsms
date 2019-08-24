<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostRating;
use App\PostComments;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
  public function show($id)
  {
    $post = Post::where('id', $id)->first();
    $comments = PostComments::where('post_id', $id)->get();

    return view('showpost', compact('post', 'comments'));
  }


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
    $path = str_replace('public', 'storage', $path); // this needs to be improved and not janky

    $post = new Post();
    $post->user_id = Auth::user()->id;
    $post->original_name = $original;
    $post->tags = $request->input('tags');
    $post->path = $path;
    $post->save();
    $post_id = $post->id;

    return redirect()->route('showpost', ['id' => $post_id]);
  }

  public function rate(Request $request)
  {
    request()->validate([
      'post_id' => 'required',
      'action' => 'required'
    ]);

    $postid = $request->input('post_id');
    $action = $request->input('action');
    $userid = Auth::user()->id;

    switch ($action) {
      case 'like':
        if ($this->hasrated($postid, $userid, 0) == true) {
          DB::table('post_ratings')
            ->where('post_id', $postid)
            ->where('user_id', $userid)
            ->update(['rating' => 1]);
        }
        else {
          $rating = new PostRating();
          $rating->post_id = $postid;
          $rating->user_id = $userid;
          $rating->rating = true;
          $rating->save();
        }
        break;

      case 'dislike':
        if ($this->hasrated($postid, $userid, 1) == true) {
          DB::table('post_ratings')
            ->where('post_id', $postid)
            ->where('user_id', $userid)
            ->update(['rating' => 0]);
        }
        else {
          $rating = new PostRating();
          $rating->post_id = $postid;
          $rating->user_id = $userid;
          $rating->rating = false;
          $rating->save();
        }
        break;

      case 'unlike':
        if ($this->hasrated($postid, $userid, 1) == true) {
          DB::table('post_ratings')
            ->where('post_id', $postid)
            ->where('user_id', $userid)
            ->delete();
        }
        break;

      case 'undislike':
        if ($this->hasrated($postid, $userid, 0) == true) {
          DB::table('post_ratings')
            ->where('post_id', $postid)
            ->where('user_id', $userid)
            ->delete();
        }
        break;

      default:
        return null;
        break;
    }

    return null;


  }

  /**
  * Checks if the user has rated a post w/ a certain rating
  */
  private function hasrated($postid, $userid, $rating)
  {
    $rows = DB::table('post_ratings')
              ->where('post_id', $postid)
              ->where('user_id', $userid)
              ->where('rating', $rating)
              ->get()->count();


    if ($rows) {
      return true;
    }
    else {
      return false;
    }
  }
}
