<html>
<head>
    <title>Podsumowania</title>
</head>
<body>
<form action="{{ route('podsumowania.store') }}" method="POST">
    @csrf
    <label for="selected_date">Wybierz datę:</label>
    <input type="date" id="selected_date" name="selected_date">
    <button type="submit">Dodaj podsumowanie</button>
</form>
<h1>Podsumowanie</h1>
@foreach($podsumowania as $podsumowanie)
    <p>Ilość wypożyczeń: {{ $podsumowanie->ilosc_wypozyczen }}</p>
    <p>Zysk z wypożyczeń: {{ $podsumowanie->koszt }}</p>
    <p>Ilość odbiorów: {{ $podsumowanie->ilosc_odbiorow }}</p>
    <p>Ilość uszkodzonych hulajnóg: {{ $podsumowanie->liczba_uszkodzonych }}</p>
    <p>Koszt uszkodzeń: {{ $podsumowanie->koszt_uszkodzen }}</p>
    <form action="{{ route('podsumowania.destroy', $podsumowanie->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
@endforeach

</body>
</html>

