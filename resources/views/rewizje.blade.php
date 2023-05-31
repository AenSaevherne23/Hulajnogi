<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rewizje</title>
</head>
<body>
<div style="display:flex; align-items: center; justify-content: center; flex-direction: column; margin-bottom: 2.5rem;">
    <h2>Dodaj nową placówkę</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">
        Dodaj
    </button>
</div>

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <h1>Lista rewizji</h1>
    <table class="table table-striped table-bordered w-50">
        <thead>
        <tr>
            <th>Data</th>
            <th>Czy uszkodzona</th>
            <th>Koszt uszkodzeń</th>
            <th>Opis</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rewizje as $rewizja)
            <tr>
                <td>{{$rewizja->Data}}</td>
                <td>{{$rewizja->Czy_uszkodzona}}</td>
                <td>{{$rewizja->Opis}}</td>
                <td>{{$rewizja->Koszt_uszkodzen}}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRecordModal{{$rewizja->id}}">
                        Edytuj
                    </button>
                    <form action="{{ route('rewizje.destroy', $rewizja->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Record Modal -->
            <div class="modal fade" id="editRecordModal{{$rewizja->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$rewizja->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRecordModalLabel{{$rewizja->id}}">Edytuj rewizje</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('rewizje.update', $rewizja->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nazwa{{$rewizja->id}}" class="form-label">Data:</label>
                                    <input type="text" class="form-control" id="edit_nazwa{{$rewizja->id}}" name="data" value="{{$rewizja->Data}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$rewizja->id}}" class="form-label">Czy uszkodzona:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$rewizja->id}}" name="czy_uszkodzona" value="{{$rewizja->Czy_uszkodzona}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$rewizja->id}}" class="form-label">Opis:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$rewizja->id}}" name="opis" value="{{$rewizja->Opis}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$rewizja->id}}" class="form-label">Koszt uszkodzenia:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$rewizja->id}}" name="koszt_uszkodzen" value="{{$rewizja->Koszt_uszkodzen}}" required>
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
                <h5 class="modal-title" id="addRecordModalLabel">Dodaj rewizję</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rewizje.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="data" class="form-label">Data:</label>
                        <input type="text" class="form-control" id="data" name="data" required>
                    </div>
                    <div class="mb-3">
                        <label for="czy_uszkodzona" class="form-label">Czy uszkodzona:</label>
                        <input type="text" class="form-control" id="czy_uszkodzona" name="czy_uszkodzona" required>
                    </div>
                    <div class="mb-3">
                        <label for="opis" class="form-label">Opis:</label>
                        <input type="text" class="form-control" id="opis" name="opis" required>
                    </div>
                    <div class="mb-3">
                        <label for="koszt_uszkodzen" class="form-label">Koszt uszkodzeń:</label>
                        <input type="text" class="form-control" id="koszt_uszkodzen" name="koszt_uszkodzen" required>
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
