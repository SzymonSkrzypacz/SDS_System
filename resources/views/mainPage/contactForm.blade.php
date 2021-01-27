@section('contactFormContent')

    <a name="contactForm">
        <div class="container imgBackground noborder ">
            <h5 class="text-warning mb-3 mysize1 text-center contacFormtTitle">Formularz kontaktowy</h5>

            <div class="mt-5 lastdiv">

                <label for="exampleFormControlTextarea1" class="form-label my-2">Imię i nazwisko</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control my-2" placeholder="Imię" aria-label="Imię">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control my-2" placeholder="Nazwisko" aria-label="Nazwisko">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label my-2">Adres e-mail</label>
                    <input type="email" class="form-control my-2" id="exampleFormControlInput1" placeholder="email@example
               .com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label my-2">Treść wiadomości</label>
                    <textarea class="form-control my-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>

            <button type="button" class="btn btn-warning text-center my-3">Wyślij</button>
        </div>

        <footer>
            <div>
                <p>
                    &copy; Wszystkie prawa zastrzeżone.
                </p>
            </div>

        </footer>
    </a>

@endsection
