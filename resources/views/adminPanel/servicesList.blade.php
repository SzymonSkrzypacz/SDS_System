@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista usług</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Akcje</th>
    </tr>
    </thead>
    <tbody>
    @foreach($servicesList as $service)

    <tr>
        <th scope="row">{{ $orderNumber++ }}</th>
        <td>{{ $service->name }}</td>
        <td>
            @can('delete', $service)
                    <a href="{{  url('/panel/services/delete/'.$service->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
            @endcan
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

    </div>
@endsection('content')
