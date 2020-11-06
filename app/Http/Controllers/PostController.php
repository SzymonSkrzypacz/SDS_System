<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(5);
      $title = 'Latest Posts';
      //return home.blade.php template from resources/views folder
      return view('posts.list')->withPosts($posts)->withTitle($title);
    }

    public function create(Request $request)
    {

      if ($request->user()->is_admin() || $request->user()->is_privileged_user() ) {
        return view('posts.create');
      } else {
        return redirect('/')->withErrors('You have not sufficient permissions for writing post');
      }
    }


    public function store(PostFormRequest $request)
    {
      $post = new Post();
      $post->title = $request->get('title');
      $post->body = $request->get('body');
      $post->slug = Str::slug($post->title);

      $duplicate = Post::where('slug', $post->slug)->first();
      if ($duplicate) {
        return redirect('blog/createPost')->withErrors('Title already exists.')->withInput();
      }

      $post->author_id = $request->user()->id;
      if ($request->has('save')) {
        $message = 'Post saved successfully';
      } else {
        $message = 'Post did not saved';
      }
      $post->save();
       return redirect('/blog')->withMessage($message);


    }


    public function show($slug)
  {
    $post = Post::where('slug',$slug)->first();
    if(!$post)
    {
       return redirect('/')->withErrors('requested page not found');
    }
    $comments = $post->comments;
    return view('posts.show')->withPost($post)->withComments($comments);
  }
}
