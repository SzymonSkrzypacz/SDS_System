@section('offerContent')

<div class="container imgBackground noborder d-flex flex-column align-items-center justify-content-center secondbg">
    <h5 class="text-warning mb-5 mysize1">Oferta</h5>


    @foreach($services as $service)
        <div class="d-flex flex-column align-items-center justify-content-center">

           <ul class="text-white mysize">{{$service->name}} </ul>

        </div>

    @endforeach

<p class=" p text-white text-center my-4"> <span class="font-weight-bold">Cennik usług zależy od wielu
        czynników</span>, między innymi
    metrażu, czasu potrzebnego na wykonanie usługi lub komplikacji.
    Moja firma podchodzi do każdego
    klienta indywidualnie. <span class="text-warning">Wycena jest bezpłatna</span>. Zapraszam do kontaktu telefonicznego,
    mailowego oraz przez formularz w zakładce kontakt.</p>

</div>

@endsection


