<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HULAJNOGI</title>
</head>
<body>
<h1>Lista hulajnóg</h1>
<table class="table table-striped table-bordered">
    <thread>
        <tr>

            <th>nazwa</th>
            <th>model</th>

        </tr>
    </thread>
    <tbody>
    @foreach ($hulajnogi as $hulajnoga)
        <tr>
        <td>{{ $hulajnoga->Nazwa }}</td>
            <td>{{ $hulajnoga->Model }}</td>
            <td>
                <form action="{{route('hulajnogi.destroy', $hulajnoga->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="container">
    <h2>Dodaj Nową Hulajnogę</h2>
    <form action="{{route('hulajnogi.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nazwa" class="form-label">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model:</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
</div>


<?php
    use App\Models\Hulajnogi;
    /*$rekordy=Hulajnogi::factory()->count(5)->create();*/
    ?>

</body>
</html>
