@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Informacja') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Jesteś zalogowany!') }}
                </div>
            </div>

            <a class="btn btn-success" href="{{ url('/blog')}}">Blog</a>
           <a class="btn btn-secondary" href="{{ url('/panel/users')}}">Zarządzaj użytkownikami</a>
            <a class="btn btn-secondary"href="{{ url('/panel/services')}}">Zarządzaj usługami </a>

        </div>
    </div>
</div>
@endsection
