@extends('layouts.app')

@section('content')


@can('create', App\Post::class)
        <a href="{{ url('/blog/createPost')
        }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Dodaj post</a>
        @endcan


@if ( !$posts->count() )
    Nie ma jeszcze żadnych postów. Zaloguj się aby dodać nowe posty.

@else
<div class="">
  @foreach( $posts as $post )
  <div class="list-group">
    <div class="list-group-item">
      <h3><a href="{{ url('/blog/post'.'/'.$post->slug) }}">{{ $post->title }}</a>
      </h3>
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} autor: <b> {{ $post->author->username }}</b></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 100, $end = '....... <a href='.url("/blog".'/'.'post'.'/'.$post->slug)
        .'>Zobacz więcej...</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
@endsection
