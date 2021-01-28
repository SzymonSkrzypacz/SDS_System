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
        return view('posts.list')->withPosts($posts)->withTitle($title);
    }

    public function create(Request $request)
    {

        if ($request->user()->is_admin() || $request->user()->is_privileged_user()) {
            return view('posts.create');
        } else {
            return redirect('/')->with('error', 'Nieprawidłowa operacja. Nie posiadasz wymaganych uprawnień.');
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
            return redirect('blog/createPost')->with('error', 'Taki tytuł już istnieje.');
        }

        $post->author_id = $request->user()->id;
        $post->save();


        return redirect('/blog')->with('success', 'Post został dodany.');
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return redirect('/')->withErrors('Strony nie znaleziono.');
        }
        $comments = $post->comments;
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post', $post);
        return redirect('/')->with('error', 'Nieprawidłowa operacja. Nie posiadasz wymaganych uprawnień.');
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
                    return redirect('blog/editPost')->with('error', 'Tytuł już istnieje.');
                } else {
                    $post->slug = $slug;
                }
            }

            $post->title = $title;
            $post->body = $request->input('body');
            $post->save();

            return redirect('/blog/post' . '/' . $post->slug)->with('success', 'Post został edytowany prawidłowo.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
            return redirect('blog/')->with('success', 'Post został usunięty.');
        } else {
            return redirect('blog/')->with('error', 'Nieprawidłowa operacja. Nie posiadasz wymaganych uprawnień.');
        }
    }
}
