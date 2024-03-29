@extends('layouts.app')
@section('title')
Edit Post
@endsection
@section('content')
<form method="post" action='{{ url("/blog/updatePost") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
  <div class="form-group">
    <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
  </div>
  <div class="form-group">
    <textarea name='body'class="form-control">
      @if(!old('body'))
      {!! $post->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
  </div>

  <input type="submit" name='publish' class="btn btn-success" value = "Opublikuj"/>

</form>
@endsection
