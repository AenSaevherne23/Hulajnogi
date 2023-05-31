@extends('layouts.app')

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
                                        {{--@foreach($hulajnoga->placowki ?? [] as $placowka)
                                            {{ $placowka->nazwa }}<br>
                                        @endforeach--}}
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
