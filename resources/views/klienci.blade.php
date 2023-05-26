<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>KLIENICI</title>
</head>
<body>
<div style="display:flex; align-items: center; justify-content: center; flex-direction: column; margin-bottom: 2.5rem;">
    <h2>Dodaj Nowego Klienta</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">Dodaj</button>
</div>

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <h1>Lista klientów</h1>
    <table class="table table-striped table-bordered w-50">
        <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tb
        @foreach($klienci as $klient)
            <tr>
                <td>{{$klient->Imie}}</td>
                <td>{{$klient->Nazwisko}}</td>
                <td>{{$klient->Telefon}}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRecordModal{{$klient->id}}">Edytuj</button>
                    <form action="{{route('klienci.destroy', $klient->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Record Modal -->
            <div class="modal fade" id="editRecordModal{{$klient->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$klient->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRecordModalLabel{{$klient->id}}">Edytuj klientów</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('klienci.update', $klient->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_nazwa{{$klient->id}}" class="form-label">Imie:</label>
                                    <input type="text" class="form-control" id="edit_nazwa{{$klient->id}}" name="imie" value="{{$klient->imie}}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$klient->id}}" class="form-label">Nazwisko:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$klient->id}}" name="nazwisko" value="{{$klient->nazwisko}}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_adres{{$klient->id}}" class="form-label">Telefon:</label>
                                    <input type="text" class="form-control" id="edit_adres{{$klient->id}}" name="telefon" value="{{$klient->telefon}}">
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
                <h5 class="modal-title" id="addRecordModalLabel">Dodaj klienta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('klienci.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="imie" class="form-label">Imię:</label>
                        <input type="text" class="form-control" id="imie" name="imie">
                    </div>
                    <div class="mb-3">
                        <label for="nazwisko" class="form-label">Nazwisko:</label>
                        <input type="text" class="form-control" id="nazwisko" name="nazwisko">
                    </div>
                    <div class="mb-3">
                        <label for="telefon" class="form-label">Telefon:</label>
                        <input type="text" class="form-control" id="telefon" name="telefon">
                    </div>
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
use App\Models\Klienci;
/*$rekordy=Klienci::factory()->count(5)->create();*/
?>
</body>
</html>
