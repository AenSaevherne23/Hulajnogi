<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Placówki</title>
</head>
<body>
<div style="display:flex; align-items: center; justify-content: center; flex-direction: column; margin-bottom: 2.5rem;">
    <h2>Dodaj nową placówkę</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">
        Dodaj
    </button>
</div>

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <h1>Lista placówek</h1>
    <table class="table table-striped table-bordered w-50">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Adres</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($placowki as $placowka)
            <tr>
                <td>{{$placowka->nazwa}}</td>
                <td>{{$placowka->adres}}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRecordModal{{$placowka->id}}">
                        Edytuj
                    </button>
                    <form action="{{ route('placowki.destroy', $placowka->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Record Modal -->
            <div class="modal fade" id="editRecordModal{{$placowka->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$placowka->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRecordModalLabel{{$placowka->id}}">Edytuj placówki</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('placowki.update', $placowka->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nazwa{{$placowka->id}}" class="form-label">Nazwa:</label>
                                    <input type="text" class="form-control" id="edit_nazwa{{$placowka->id}}" name="nazwa" value="{{$placowka->nazwa}}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$placowka->id}}" class="form-label">Adres:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$placowka->id}}" name="adres" value="{{$placowka->adres}}">
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
                <h5 class="modal-title" id="addRecordModalLabel">Dodaj placówkę</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('placowki.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nazwa" class="form-label">Nazwa:</label>
                        <input type="text" class="form-control" id="nazwa" name="nazwa">
                    </div>
                    <div class="mb-3">
                        <label for="adres" class="form-label">Adres:</label>
                        <input type="text" class="form-control" id="adres" name="adres">
                    </div>
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
