<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>KLIENICI</title>
</head>
<body>
<h1>Lista klientów</h1>

<table class="table table-striped table-bordered">
    <thread>
        <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Login</th>
            <th>Hasło</th>
        </tr>
    </thread>
    <tbody>
    @foreach ($klienci as $klient)
        <tr>
            <td>{{ $klient->Imie }}</td>
            <td>{{ $klient->Nazwisko }}</td>
            <td>{{ $klient->Email }}</td>
            <td>{{ $klient->Login }}</td>
            <td>{{ $klient->Haslo }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<?php
use App\Models\Klienci;
$rekordy=Klienci::factory()->count(5)->create();
?>
</body>
</html>
