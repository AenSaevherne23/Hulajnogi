<html>
<head>
    <title>Podsumowania</title>
</head>
<body>
<form action="{{ route('podsumowania.store') }}" method="POST">
    @csrf
    <button type="submit">Zapisz podsumowanie</button>
</form>
<h1>Podsumowanie</h1>
@foreach($podsumowania as $podsumowanie)
    <p>Ilość wypożyczeń: {{ $podsumowanie->ilosc_wypozyczen }}</p>
    <p>Zysk z wypożyczeń: {{ $podsumowanie->koszt }}</p>
    <p>Ilość odbiorów: {{ $podsumowanie->ilosc_odbiorow }}</p>
    <p>Ilość uszkodzonych hulajnóg: {{ $podsumowanie->liczba_uszkodzonych }}</p>
    <p>Koszt uszkodzeń: {{ $podsumowanie->koszt_uszkodzen }}</p>
@endforeach



</body>
</html>

