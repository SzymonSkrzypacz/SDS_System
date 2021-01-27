@extends('layouts.app')

@section('content')
@if($post)
  <h1>{!! $post->title !!}</h1>
  <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} autor: <b>{{ $post->author->username }}</b></p>

      <div>
        {!! $post->body !!}
      </div>

      @can('delete',$post)
      <a href="{{  url('/blog/deletePost/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger mt-5">Usuń
          post</a>
    @endcan
  @can('update',$post)
      <a class="btn btn-info mt-5 text-white" href="{{ url('/blog/editPost/'.$post->slug)}}">Edytuj post</a>
  @endcan
  @else
  Strona nie istnieje,
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
     <a class="btn btn-primary" href="{{ url('/blog/editComment/'.$comment->id)}}">Edytuj komentarz</a>
      @endcan
      @can('delete',$comment)
      <a href="{{  url('/blog/deleteComment/'.$comment->id) }}" class="btn btn-danger">Usuń komentarz</a>
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
            <h2 class="py-3">Zostaw komentarz</h2>
            <textarea required="required" placeholder="Zostaw komentarz tutaj" name = "body"
                      class="form-control"></textarea>
          </div>
          <input type="submit" name='post_comment' class="btn btn-success" value = "Opublikuj"/>

      </form>
    </div>
    @else
    <p><a href="{{url('/login')}}">Zaloguj</a> lub <a href="{{url('/register')}}">Zarejestruj się</a> aby móc
        komentować ten post.</p>

  <div>

@endif
@endsection
