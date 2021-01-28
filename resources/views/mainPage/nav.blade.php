@section('navContent')



<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-0">
    <div class="container p-0">
        <a class="navbar-brand" href="{{ url('/')}}">
            <img src="{{ URL::to('/assets/SDS_system_logo_white.png') }}" width="210" height="70"
                 alt="logo SDS System"> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarToggleContent">

            <ul class="navbar-nav mr-auto ">
                @if (Route::has('login'))

                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="#aboutMe">O mnie</a></li>
                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="#offer">Oferta</a></li>
                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white"
                                                         href="#gallery">Galeria</a></li>
                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="#contact">Dane
                            kontaktowe</a></li>
                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white"
                                                         href="#contactForm">Kontakt</a></li>
                    <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url('/blog')
                    }}">Blog</a></li>
                    @auth

                    @else

                        <li class="nav-item"><a class="nav-link btn btn-outline-warning text-warning" href="{{ route('login')}}">Zaloguj</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link btn btn-warning text-dark"  href="{{ route('register')}}">Zarejestruj</a></li>

                        @endif
                    @endauth

                @endif
            </ul>
        </div>
    </div>
</nav>
@endsection
