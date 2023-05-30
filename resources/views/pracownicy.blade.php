@extends('layouts.app')
@section('content')


@php
    use App\Models\Placowki;
@endphp

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column; margin-bottom: 2.5rem;">
    <h2>Dodaj nowego pracownika</h2>
    @if (auth()->user()->isAdmin())
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            Dodaj
        </button>
    @endif
</div>

<div style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <h1>Lista pracowników</h1>
    <table class="table table-striped table-bordered w-50">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Email</th>
            <th>Placówka</th>
            @if (auth()->user()->isAdmin())
                <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    @if($employee->placowka)
                        {{$employee->placowka->nazwa}}
                    @else
                        Brak przypisanej placówki
                    @endif
                </td>
                @if (auth()->user()->isAdmin())
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRecordModal{{$employee->id}}">
                            Edytuj
                        </button>
                        <form action="{{ route('pracownicy.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        </form>
                    </td>
                @endif
            </tr>

            <!-- Edit Record Modal -->
            @if (auth()->user()->isAdmin())
                <div class="modal fade" id="editRecordModal{{$employee->id}}" tabindex="-1" aria-labelledby="editRecordModalLabel{{$employee->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRecordModalLabel{{$employee->id}}">Edytuj pracownika</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pracownicy.update', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="edit_name{{$employee->id}}" class="form-label">Imię:</label>
                                        <input type="text" class="form-control" id="edit_name{{$employee->id}}" name="name" value="{{$employee->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_email{{$employee->id}}" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="edit_email{{$employee->id}}" name="email" value="{{$employee->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_placowka{{$employee->id}}" class="form-label">Placówka:</label>
                                        <select class="form-control" id="edit_placowka{{$employee->id}}" name="id_placowki">
                                            <option value="" selected>Brak placówki</option>
                                            @foreach(Placowki::all() as $placowka)
                                                <option value="{{$placowka->id}}" @if($employee->placowka && $employee->placowka->id === $placowka->id) selected @endif>{{$placowka->nazwa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Zapisz</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

<!-- Form Popup Modal -->
@if (auth()->user()->isAdmin())
    <div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRecordModalLabel">Dodaj pracownika</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pracownicy.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Imię:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="placowka" class="form-label">Placówka:</label>
                            <select class="form-control" id="placowka" name="id_placowki">
                                <option value="" selected>Brak placówki</option>
                                @foreach(Placowki::all() as $placowka)
                                    <option value="{{$placowka->id}}">{{$placowka->nazwa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Dodaj</button>
                    </form>

                    <a class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-in-right"></i>

                        <span class="text-[15px] ml-4 text-gray-200 font-bold">   {{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
