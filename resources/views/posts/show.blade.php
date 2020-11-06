@extends('layouts.app')

@section('content')
@if($post)
  <h1>{!! $post->title !!}</h1>
  <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} by <b>{{ $post->author->username }}</b></p>
    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
      <button class="btn" style="float: right"><a href="{{ url('/blog/editPost/'.$post->slug)}}">Edit Post</a></button>
      <div>
        {!! $post->body !!}
      </div>
      <a href="{{  url('/blog/deletePost/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
    @endif
  @else
    Page does not exist
  @endif


  <br/>
  <br/>

  @if(Auth::guest())
    <p>Login to Comment</p>
  @else
    <div class="panel-body">
      <form method="post" action="/blog/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="slug" value="{{ $post->slug }}">

      </form>
    </div>
  <div>

    @if($comments)
    <ul style="list-style: none; padding: 0">
      @foreach($comments as $comment)
        <li class="panel-body">
          <div class="list-group">
            <div class="list-group-item">
              <h4>{{ $comment->author->username}}</h4>
              <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
            </div>
            <div class="list-group-item">
              <p>{{ $comment->body }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @endif

    <div class="form-group">
        <h2>Leave a comment</h2>
        <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
      </div>
      <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
  </div>
@endif
@endsection
