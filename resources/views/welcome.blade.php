<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SDS System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-0">
                <div class="container p-0">
                    <a class="navbar-brand" href="#">
                        <img src="{{ URL::to('/assets/SDS_system_logo_white.png') }}" width="210" height="70"
                             alt="logo SDS
                        System"> </a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                            data-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                       <div class="collapse navbar-collapse" id="navbarToggleContent">

                           <ul class="navbar-nav mr-auto ">
                               @if (Route::has('login'))
                                   <li class="nav-item myeditedcnav"><a class="nav-link btn mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Home</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home') }}">O
                                           mnie</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Oferta</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Galeria</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Dane firmy</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Kontakt</a></li>
                                   <li class="nav-item myeditedcnav"><a class="nav-link mx-3 text-white" href="{{ url
                                   ('/home')
                                   }}">Blog</a></li>
                                   @auth
                                       <li class="nav-item"><a class="nav-link text-white"  href="{{ url('/home')
                                       }}">Home</a></li>
                                   @else

                                       <li class="nav-item"><a class="nav-link btn btn-outline-warning text-warning"
                                                               href="{{ route
                                    ('login')
                                    }}">Zaloguj</a></li>

                                       @if (Route::has('register'))
                                           <li class="nav-item"><a class="nav-link btn btn-warning text-dark"  href="{{ route('register')
                                        }}">Zarejestruj</a></li>

                                       @endif
                                   @endauth

                               @endif
                           </ul>
                       </div>
                   </div>


                </div>
            </nav>

            <div class="title m-b-md">
                SDS System - strona główna
            </div>

    </body>
</html>
