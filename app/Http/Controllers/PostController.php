<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(5);
      $title = 'Latest Posts';
      //return home.blade.php template from resources/views folder
      return view('posts.list')->withPosts($posts)->withTitle($title);
    }
}
