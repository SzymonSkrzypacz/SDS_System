@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista użytkowników</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">isBlocked</th>
    </tr>
    </thead>
    <tbody>
    @foreach($usersList as $user)

    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role_id }}</td>
        <td>{{ $user->isBlocked }}</td>
    </tr>

    @endforeach
    </tbody>
</table>

    </div>
@endsection('content')
