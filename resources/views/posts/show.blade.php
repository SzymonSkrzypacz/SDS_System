@extends('layouts.app')

@section('content')
@if($post)
  <h1>{!! $post->title !!}</h1>
  <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} by <b>{{ $post->author->username }}</b></p>
    @can('update',$post)
      <button class="btn" style="float: right"><a href="{{ url('/blog/editPost/'.$post->slug)}}">Edit Post</a></button>
      @endcan
      <div>
        {!! $post->body !!}
      </div>

      @can('delete',$post)
      <a href="{{  url('/blog/deletePost/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
    @endcan
  @else
    Page does not exist
  @endif


  <br/>
  <br/>


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

              @can('update',$comment)
      <button class="btn" style="float: right"><a href="{{ url('/blog/editComment/'.$comment->id)}}">Edit comment</a></button>
      @endcan
      @can('delete',$comment)
      <a href="{{  url('/blog/deleteComment/'.$comment->id) }}" class="btn btn-danger">Delete comment</a>
    @endcan
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @endif


    @if(Auth::check())
    <div class="panel-body">
      <form method="post" action="/blog/addComment">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="slug" value="{{ $post->slug }}">
        <div class="form-group">
            <h2>Leave a comment</h2>
            <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
          </div>
          <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
      </div>
      </form>
    </div>
    @else
    <p><a href="{{url('/login')}}">Login </a> or <a href="{{url('/register')}}">register</a> to comment this post</p>

  <div>

@endif
@endsection
