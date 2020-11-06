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
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $title = 'Latest Posts';
        //return home.blade.php template from resources/views folder
        return view('posts.list')->withPosts($posts)->withTitle($title);
    }

    public function create(Request $request)
    {

        if ($request->user()->is_admin() || $request->user()->is_privileged_user()) {
            return view('posts.create');
        } else {
            return redirect('/')->with('error', 'You have not sufficient permissions for writing post');
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
            return redirect('blog/createPost')->with('error', 'Title already exists.');
        }

        $post->author_id = $request->user()->id;
        $post->save();


        return redirect('/blog')->with('success', 'Post has been added successfully.');
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return redirect('/')->withErrors('requested page not found');
        }
        $comments = $post->comments;
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post', $post);
        return redirect('/')->with('error', 'you have not sufficient permissions');
    }


    public function update(Request $request)
    {

        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $title = $request->input('title');
            $slug = Str::slug($title);
            $duplicate = Post::where('slug', $slug)->first();
            if ($duplicate) {
                if ($duplicate->id != $post_id) {
                    return redirect('blog/editPost')->with('error', 'Title already exists.');
                } else {
                    $post->slug = $slug;
                }
            }

            $post->title = $title;
            $post->body = $request->input('body');
            $post->save();

            return redirect('/blog' . '/' . $post->slug)->with('success', 'Post has been updated successfully.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
            return redirect('blog/')->with('success', 'Post has been deleted successfully');
        } else {
            return redirect('blog/')->with('error', 'Invalid operation. You have not sufficient permissions.');
        }
    }
}
