@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Informacja') }}</div>

                <div class="card-body bg-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div >
                    @endif

                    {{ __('Jesteś zalogowany!') }}
                </div>
            </div>

            <a class="btn btn-outline-success" href="{{ url('/blog')}}">Blog</a>
            @if(Auth::user()->is_admin())
           <a class="btn btn-outline-secondary" href="{{ url('/panel/users')}}">Zarządzaj użytkownikami</a>
            <a class="btn btn-outline-secondary"href="{{ url('/panel/services')}}">Zarządzaj usługami </a>
@endif
        </div>
    </div>
</div>
@endsection
