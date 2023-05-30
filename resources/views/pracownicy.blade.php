<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj pracowników</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista pracowników</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Email</th>
            <th>Placówka</th>
            @if (auth()->user()->isAdmin())
                <th>Akcje</th>
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
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editRecordModal{{$employee->id}}">
                            Edytuj
                        </button>
                    </td>
                @endif
            </tr>

          <!-- Modal - Edycja pracownika -->
@if (auth()->user()->isAdmin())
<div class="modal fade" id="editRecordModal{{$employee->id}}" tabindex="-1"
     aria-labelledby="editRecordModal{{$employee->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRecordModal{{$employee->id}}Label">Edytuj pracownika</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pracownicy.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Imię i nazwisko</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Pensja</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_placowki" class="form-label">Przypisana placówka</label>
                        <select class="form-select" id="id_placowki" name="id_placowki" required>
                            <option value="">Wybierz placówkę</option>
                            @foreach(\App\Models\Placowki::all() as $placowka)
                                <option value="{{ $placowka->id }}" {{ $placowka->id == $employee->id_placowki ? 'selected' : '' }}>
                                    {{ $placowka->nazwa }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rola</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Wybierz rolę</option>
                            <option value="admin" {{ $employee->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="employee" {{ $employee->role === 'employee' ? 'selected' : '' }}>Employee</option>
                            <option value="client" {{ $employee->role === 'client' ? 'selected' : '' }}>Client</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
