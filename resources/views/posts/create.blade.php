@extends('layouts.app')

@section('title')

Add New Post

@endsection

@section('content')



<form action="/blog/createPost" method="post">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">

<input required="required" value="{{ old('title') }}" placeholder="Tytuł..." type="text" name =
"title"class="form-control" />

</div>

<div class="form-group">

<textarea name='body'class="form-control">{{ old('body') }}</textarea>

</div>

<input type="submit" name='publish' class="btn btn-success" value = "Opublikuj"/>

</form>

@endsection
