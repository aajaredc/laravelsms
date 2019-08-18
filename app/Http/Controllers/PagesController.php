<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
      $contents = [
        'One',
        'And a two',
        'And a three four five'
      ];

        return view('welcome', [
          'contents' => $contents
        ]);
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
