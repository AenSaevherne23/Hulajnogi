@extends('layouts.app')
<title>Wypożyczenia</title>
@section('content')
<form action="{{ route('wypozyczenia.store') }}" method="POST">
    @csrf
    <!-- Formularz danych wypożyczenia -->
    <div>
        <label for="klient_id">Klient:</label>
        <select name="klient_id" id="klient_id">
            @foreach($klienci as $klient)
                <option value="{{ $klient->id }}">{{ $klient->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="data_rozpoczecia">Data rozpoczęcia:</label>
        <input type="text" id="datetimepicker" name="data_wyp" placeholder="Wybierz datę rozpoczęcia..."/>
        <script>
            flatpickr("#datetimepicker",{
                "locale":"pl",
                time_24hr: true,
                enableTime:true,
                dateFormat:"Y-m-d H:i",
                onChange: function(selectedDates, dateStr) {
                    const inputElement = document.querySelector('input[name="data_wyp"]');
                    inputElement.value = dateStr;
                }});
        </script>


    </div>

    <div>
        <label for="data_zakonczenia">Data zakończenia:</label>
        <input type="text" id="datetimepicker2" name="data_zak" placeholder="Wybierz datę zakończenia..."/>
        <script>
            flatpickr("#datetimepicker2", {
                "locale": "pl",
                time_24hr: true,
                enableTime: true,
                dateFormat: "Y-m-d H:i:s",
                onChange: function(selectedDates, dateStr) {
                    const inputElement = document.querySelector('input[name="data_zak"]');
                    inputElement.value = dateStr;
                }
            });
        </script>
    </div>

    <!-- Lista hulajnóg -->
    <div>
        <label>Hulajnogi:</label>
        @foreach($hulajnogi as $hulajnoga)
            <div>
                <input type="checkbox" name="hulajnogi[]" value="{{ $hulajnoga->id }}" multiple>
                <span>{{ $hulajnoga->Nazwa }}</span>
            </div>
        @endforeach
    </div>

    <button type="submit">Zapisz</button>
</form>

@foreach($wypozyczenia as $wypozyczenie)
    <p>Id: {{ $wypozyczenie->id }}</p>
    <p>Data i godzina rozpoczęcia: {{ $wypozyczenie->data_wypozyczenia }}</p>
    <p>Data i godzina zakończenia: {{ $wypozyczenie->data_zakonczenia }}</p>
    <p>Klient: {{ $wypozyczenie->klient->name }}</p>
    <p>Pracownik: {{ $wypozyczenie->pracownik->name }}</p>
    @if ($wypozyczenie->pracownik->placowka)
        <p>Placówka: {{ $wypozyczenie->pracownik->placowka->nazwa }}</p>
    @endif
    @if ($wypozyczenie->hulajnogi)
        <?php
            $licznik=1;
            ?>
        @foreach($wypozyczenie->hulajnogi as $hul)
            Hulajnoga {{$licznik++}}:
            <p>Nazwa: {{$hul->Nazwa}}</p>
            <p>Model: {{$hul->Model}}</p>
        @endforeach
    @endif

    <form action="{{ route('wypozyczenia.destroy', $wypozyczenie->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
    </form>
@endforeach
@endsection
