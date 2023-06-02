<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edycja pracownika</h1>

        <form action="{{ route('pracownicy.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Imię i nazwisko</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Adres e-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $employee->email }}" required>
            </div>

            <div class="form-group">
                <label for="salary">Wynagrodzenie</label>
                <input type="number" class="form-control" name="salary" id="salary" value="{{ $employee->salary }}" required>
            </div>

            <div class="form-group">
                <label for="id_placowki">Przypisana placówka</label>
                <select name="id_placowki" id="id_placowki" class="form-control" required>
                    @foreach(\App\Models\Placowki::all() as $placowka)
                        <option value="{{ $placowka->id }}" {{ $placowka->id == $employee->id_placowki ? 'selected' : '' }}>
                            {{ $placowka->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
@endsection
