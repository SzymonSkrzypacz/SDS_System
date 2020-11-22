@extends('layouts.app')

@section('title')

Dodaj usługę

@endsection

@section('content')



<form action="/panel/services/createService" method="post">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">

<input required="required" value="{{ old('name') }}" placeholder="Tu wpisz nazwę usługi" type="text" name = "name"class="form-control" />

</div>


<input type="submit" name='publish' class="btn btn-success" value = "Utwórz"/>

</form>

@endsection
