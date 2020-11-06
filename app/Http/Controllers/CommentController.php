<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input['user_id'] = $request->user()->id;
        $input['post_id'] = $request->input('post_id');
        $input['body'] = $request->input('body');
        $slug = $request->input('slug');
        Comment::create($input);
        return redirect('/blog' . '/' . $slug)->with('success', 'Comment published');
    }



    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        if ($comment && ($comment->user_id == $request->user()->id || $request->user()->is_admin())) {
            $comment->delete();
            return redirect('blog/')->with('success', 'Comment has been deleted successfully');
        } else {
            return redirect('blog/')->with('error', 'Invalid operation. You have not sufficient permissions.');
        }
    }


    public function edit(Request $request, $id)
    {
        $comment = Comment::find($id);
        if ($comment && ($request->user()->id == $comment->user_id))
            return view('comments.edit')->with('comment', $comment);
        return redirect('blog/')->with('error', 'you have not sufficient permissions');
    }


    public function update(Request $request)
    {

        $comment_id = $request->input('comment_id');
        $comment = Comment::find($comment_id);
        if ($comment && ($comment->user_id == $request->user()->id)) {

            $comment->body = $request->input('body');
            $comment->save();
            $post = Post::find($comment->post_id);
            return redirect('/blog' . '/' . $post->slug)->with('success', 'Comment has been updated successfully.');
        }
    }
}
