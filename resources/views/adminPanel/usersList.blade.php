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
        <th scope="col">Delete user</th>
    </tr>
    </thead>
    <tbody>
    @foreach($usersList as $user)

    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        @can('update',$user)
        <td>
            <form action="/panel/users/role" method="post">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                    <select name="role_id" class="form-control col-10">
                        @foreach($roles as $data)
                            @if($data->id == $user->role_id)
                                <option value="{{$data->id}}"
                                        selected> {{$data->description}}</option>
                            @else
                                <option value="{{$data->id}}"> {{$data->description}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('role_id'))
                        <span class="help-block">{{ $errors->first('role_id') }}</span>
                    @endif
                    <input type="hidden" name="UID" value="{{$user->id}}"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </td>
    @endcan
    @cannot('update', $user)
        <td>Admin</td>
    @endcannot
        <td>
            @can('delete', $user)
                    <a href="{{  url('/panel/users/delete/'.$user->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
            @endcan
        </td>

    </tr>
    @endforeach
    </tbody>
</table>

    </div>
@endsection('content')
