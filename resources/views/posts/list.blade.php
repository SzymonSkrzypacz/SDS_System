@extends('layouts.app')

@section('content')


    @if(Auth::user()->is_admin() || Auth::user()->is_privileged_user())
        <button class="btn"><a href="{{ url('/blog/createPost')}}">Add post</a></button>
        @endif


@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $posts as $post )
  <div class="list-group">
    <div class="list-group-item">
      <h3><a href="{{ url('/blog/post'.'/'.$post->slug) }}">{{ $post->title }}</a>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
        @endif
      </h3>
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} by <b> {{ $post->author->username }}</b></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 100, $end = '....... <a href='.url("/blog".'/'.$post->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
@endsection
