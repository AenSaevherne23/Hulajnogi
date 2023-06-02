@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
 

        <h1 class="text-2xl font-bold mb-4">Lista użytkowników</h1>

        <h2 class="text-xl font-bold mb-2">Klienci</h2>
        <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nazwa</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td class="px-4 py-2">{{ $client->name }}</td>
                        <td class="px-4 py-2">{{ $client->email }}</td>
                        <td class="px-4 py-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edytuj
                            </button>
                        </td>
                    </tr>

                    <!-- Modal - Edycja klienta -->
                    <div class="modal">
                     
                    </div>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-xl font-bold my-4">Pracownicy</h2>
        <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nazwa</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Placówka</th>
                    <th class="px-4 py-2">Wypłata</th>
                    <th class="px-4 py-2">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="px-4 py-2">{{ $employee->name }}</td>
                        <td class="px-4 py-2">{{ $employee->email }}</td>
                        <td class="px-4 py-2">
                            @if($employee->placowka)
                                {{ $employee->placowka->nazwa }}
                            @else
                                Brak przypisanej placówki
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $employee->salary }}</td>
                        <td class="px-4 py-2">
                            
<!-- Modal toggle -->
<button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
Edytuj
</button>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-screen bg-opacity-50 bg-gray-900">
    <div class="relative w-full max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h2 class="text-xl font-bold mb-4">Edytuj pracownika</h2>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
    <label for="name" class="block text-gray-800 dark:text-white font-semibold mb-1">Nazwa</label>
    <input type="text" class="form-control w-full border-gray-300 rounded-lg focus:ring-blue-300" id="name" name="name" value="{{ $employee->name }}" required>
</div>

<div class="mb-4">
    <label for="email" class="block text-gray-800 dark:text-white font-semibold mb-1">Email</label>
    <input type="email" class="form-control w-full border-gray-300 rounded-lg focus:ring-blue-300" id="email" name="email" value="{{ $employee->email }}" required>
</div>

<div class="mb-4">
    <label for="salary" class="block text-gray-800 dark:text-white font-semibold mb-1">Pensja</label>
    <input type="number" class="form-control w-full border-gray-300 rounded-lg focus:ring-blue-300" id="salary" name="salary" value="{{ $employee->salary }}" required>
</div>

<div class="mb-4">
    <label for="id_placowki" class="block text-gray-800 dark:text-white font-semibold mb-1">Przypisana placówka</label>
    <select class="form-select w-full border-gray-300 rounded-lg focus:ring-blue-300" id="id_placowki" name="id_placowki" required>
        <option value="">Wybierz placówkę</option>
        @foreach(\App\Models\Placowki::all() as $placowka)
            <option value="{{ $placowka->id }}" {{ $placowka->id == $employee->id_placowki ? 'selected' : '' }}>
                {{ $placowka->nazwa }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-4">
    <label for="role" class="block text-gray-800 dark:text-white font-semibold mb-1">Rola</label>
    <select class="form-select w-full border-gray-300 rounded-lg focus:ring-blue-300" id="role" name="role" required>
        <option value="">Wybierz rolę</option>
        <option value="admin" {{ $employee->role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="employee" {{ $employee->role === 'employee' ? 'selected' : '' }}>Employee</option>
        <option value="client" {{ $employee->role === 'client' ? 'selected' : '' }}>Client</option>
    </select>
</div>

<div class="mt-6 flex justify-end">
    <button type="submit" class="block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Zapisz zmiany
    </button>
</div>


</form>
</div>
</div>
</div>
</div>


                
                        </td>
                    </tr>

                    <!-- Modal - Edycja pracownika -->
                   

                        </td>
                    </tr>

                    <!-- Modal - Edycja pracownika -->
                    <div class="modal">
                        <!-- Zawartość modala -->
                        
                    </div>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-xl font-bold my-4">Administratorzy</h2>
        <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nazwa</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td class="px-4 py-2">{{ $admin->name }}</td>
                        <td class="px-4 py-2">{{ $admin->email }}</td>
                        <td class="px-4 py-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edytuj
                            </button>
                        </td>
                    </tr>

                    <!-- Modal - Edycja administratora -->
                    <div class="modal">
                        <!-- Zawartość modala -->
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.tailwindcss.com/2.2.16/tailwind.min.js"></script>
    <script>
  // Pobierz przyciski, które mają obsługiwać modale
  const modalToggleButtons = document.querySelectorAll("[data-modal-toggle]");
  const modalHideButtons = document.querySelectorAll("[data-modal-hide]");

  // Dodaj nasłuchiwanie kliknięć do przycisków otwierających modale
  modalToggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.dataset.modalTarget;
      const modal = document.getElementById(target);
      modal.classList.toggle("hidden");
      modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
    });
  });

  // Dodaj nasłuchiwanie kliknięć do przycisków zamykających modale
  modalHideButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.dataset.modalHide;
      const modal = document.getElementById(target);
      modal.classList.add("hidden");
      modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
    });
  });
</script>
</body>
</html>
@endsection