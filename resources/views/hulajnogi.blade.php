@extends('layouts.app')

@section('content')

    <html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HULAJNOGI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div style="display:flex; align-items: center; justify-content: center; flex-direction: column; margin-bottom: 2.5rem;">
    <h2>Dodaj Nową Hulajnogę</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">Dodaj</button>
</div>

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <h1>Lista hulajnóg</h1>
    <table class="table table-striped table-bordered w-50">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Model</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tb
        @foreach($hulajnogi as $hulajnoga)
            <tr>
                <td>{{$hulajnoga->Nazwa}}</td>
                <td>{{$hulajnoga->Model}}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRecordModal{{$hulajnoga->id}}">Edytuj</button>
                    <form action="{{route('hulajnogi.destroy', $hulajnoga->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Record Modal -->
            <div class="modal fade" id="editRecordModal{{$hulajnoga->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$hulajnoga->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRecordModalLabel{{$hulajnoga->id}}">Edytuj hulajnogi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('hulajnogi.update', $hulajnoga->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nazwa{{$hulajnoga->id}}" class="form-label">Nazwa:</label>
                                    <input type="text" class="form-control" id="edit_nazwa{{$hulajnoga->id}}" name="nazwa" value="{{$hulajnoga->nazwa}}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$hulajnoga->id}}" class="form-label">Model:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$hulajnoga->id}}" name="model" value="{{$hulajnoga->model}}">
                                </div>
                                <button type="submit" class="btn btn-success">Zapisz</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Form Popup Modal -->

<div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRecordModalLabel">Dodaj hulajnogę</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    use App\Models\Hulajnogi;
    /*$rekordy=Hulajnogi::factory()->count(5)->create();*/
    ?>

</body>
</html>
@endsection
