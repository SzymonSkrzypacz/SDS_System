@extends('layouts.app')

@section('content')

<h1>Edytuj komentarz</h1>

<form method="post" action='{{ url("/blog/updateComment") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="comment_id" value="{{ $comment->id }}{{ old('comment_id') }}">

  <div class="form-group">
    <textarea name='body'class="form-control">
      @if(!old('body'))
      {!! $comment->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
  </div>

  <input type="submit" name='publish' class="btn btn-success" value = "Edytuj"/>

</form>
@endsection
