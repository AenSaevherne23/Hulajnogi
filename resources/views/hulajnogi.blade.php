@extends('layouts.app')
<title>Hulajnogi</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hulajnogi</div>

                    <div class="card-body">
                        <form action="{{ route('hulajnogi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nazwa">Nazwa</label>
                                <input type="text" name="nazwa" id="nazwa" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" id="model" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="placowka">Przypisz do placówki</label>
                                <select name="placowka_id" id="placowka" class="form-control" required>
                                    @foreach($placowki ?? [] as $placowka)
                                        <option value="{{ $placowka->id }}">{{ $placowka->nazwa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Dodaj Hulajnogę</button>
                            </div>
                        </form>

                        <table class="table mt-4">
                            <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Model</th>
                                <th>Placówka</th>
                                <th>Akcje</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hulajnogi ?? [] as $hulajnoga)
                                <tr>
                                    <td>{{ $hulajnoga->Nazwa }}</td>
                                    <td>{{ $hulajnoga->Model }}</td>
                                    <td>
                                        @if($hulajnoga->placowka)
                                            {{ $hulajnoga->placowka->nazwa }}
                                        @else
                                            Brak przypisanej placówki
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('hulajnogi.destroy', $hulajnoga->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Usuń</button>
                                        </form>

                                        <!-- Edit Record Modal -->
                                        <div class="modal fade" id="editRecordModal{{$hulajnoga->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$hulajnoga->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editRecordModalLabel{{$hulajnoga->id}}">Edytuj hulajnogę:</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('hulajnogi.update', $hulajnoga->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="edit_nazwa{{$hulajnoga->id}}" class="form-label">Nazwa:</label>
                                                                <input type="text" class="form-control" id="edit_nazwa{{$hulajnoga->id}}" name="nazwa" value="{{$hulajnoga->Nazwa}}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_model{{$hulajnoga->id}}" class="form-label">Model:</label>
                                                                <input type="text" class="form-control" id="edit_model{{$hulajnoga->id}}" name="model" value="{{$hulajnoga->Model}}" required>
                                                            </div>
                                                            <select name="placowka_id" id="edit_placowka{{$hulajnoga->id}}" class="form-control" required>
                                                                @foreach($placowki ?? [] as $placowka)
                                                                    <option value="{{ $placowka->id }}" {{ $hulajnoga->placowka_id == $placowka->id ? 'selected' : '' }}>
                                                                        {{ $placowka->nazwa }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit" class="btn btn-success">Zapisz</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
