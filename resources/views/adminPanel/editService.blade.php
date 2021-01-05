@extends('layouts.app')


@section('title')
Edytuj usługę
@endsection

@section('content')
<form method="post" action='{{ url("/panel/services/edit") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="service_id" value="{{ $service->id }}{{ old('service_id') }}">
  <div class="form-group">
    <input required="required" placeholder="Tu wpisz nazwę usługi" type="text" name = "name" class="form-control" value="@if(!old('name')){{$service->name}}@endif{{ old('name') }}"/>
  </div>


  <input type="submit" name='publish' class="btn btn-success" value = "Edytuj"/>

</form>
@endsection

