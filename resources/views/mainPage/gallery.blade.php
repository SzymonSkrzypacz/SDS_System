@section('galleryContent')
    <a name="gallery">

        <script type="text/javascript" src="{{ URL::asset('js/myJS.js') }}"></script>


        <div class="container imgBackground d-flex flex-column align-items-center justify-content-center">


            <h5 class="text-warning mb-5 mysize1 text-center">Galeria</h5>

            <div class="mt-5 row">


                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/1.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/1.jpg') }}">

                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/2.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/2.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/3.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/3.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/4.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/4.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/5.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/5.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/6.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/6.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/7.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/7.jpg') }}">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ URL::to('/assets/8.jpg') }}" class="fancybox" rel="ligthbox">
                        <img class="zoom img-fluid" src="{{ URL::to('/assets/8.jpg') }}">
                    </a>
                </div>


            </div>

        </div>

    </a>


@endsection
