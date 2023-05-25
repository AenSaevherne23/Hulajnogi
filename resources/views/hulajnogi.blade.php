<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HULAJNOGI</title>
</head>
<body>
<h1>Lista Hulajnóg</h1>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Model</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hulajnogi as $hulajnoga)
            <tr>
                <td>{{ $hulajnoga->Nazwa }}</td>
                <td>{{ $hulajnoga->Model }}</td>
                <td>
                    <button class="btn btn-primary btn-sm">Edycja</button>
                    <button class="btn btn-danger btn-sm">Usuń</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<?php
    use App\Models\Hulajnogi;
    /*$rekordy=Hulajnogi::factory()->count(5)->create();*/
    ?>

</body>
</html>
