@extends('layouts.app')
@section('content')
    <html>
    <head>
        <title>Pracownicy</title>

    </head>
    <body>

    <table class="w-full text-left transition-opacity ease-in-out duration-100">
        <thead>
        <tr class="text-black">
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Nazwa</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Email</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Placówka</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Wypłata</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Data dodania</th>
        </tr>
        </thead>
        <tbody class="text-gray-500 dark:text-gray-100 ">
        @foreach($employees as $employee)

            <tr class="  hover:bg-zinc-600 hover:bg-opacity-10 transition-colors duration-300 ease-in-out">
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        {{ $employee->name }}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">

                        {{ $employee->email }}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">

                        @if($employee->placowka)
                            {{ $employee->placowka->nazwa }}
                        @else
                            Brak przypisanej placówki
                        @endif
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">

                        {{ $employee->salary }}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center justify-between">
                        <div class="sm:flex hidden flex-col">
                            {{$employee->updated_at->format('Y-m-d')}}
                        </div>


                        <div class="table_center">
                            <div id="dropdown{{$employee->id}}" class="drop-down">
                                <div class="drop-down__button">
                                        <span class="drop-down__name w-8 h-8 inline-flex items-center justify-center text-gray-400 ml-auto">
                                            <svg viewBox="0 0 24 24" class="w-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg></span>
                                </div>
                                <div class="drop-down__menu-box">
                                    <ul class="drop-down__menu">
                                        <li data-name="profile" class="drop-down__item" data-modal-target="editRecordModal{{$employee->id}}" data-modal-toggle="editRecordModal{{$employee->id}}">Edytuj</li>
                                        <form id="deleteForm" action="{{ route('pracownicy.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex items-center">
                                                <button type="submit" class="w-full">
                                                    <li data-name="dashboard" class="drop-down__item">
                                                        Usuń
                                                    </li>
                                                </button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center justify-between">
                        <div class="sm:flex hidden flex-col">
                            {{$employee->updated_at->format('Y-m-d')}}
                        </div>


                        <div class="table_center">
                            <div id="dropdown{{$employee->id}}" class="drop-down">
                                <div class="drop-down__button">
                                    <span class="drop-down__name w-8 h-8 inline-flex items-center justify-center text-gray-400 ml-auto">
                                        <svg viewBox="0 0 24 24" class="w-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </span>
                                </div>
                                <div class="drop-down__menu-box">
                                    <ul class="drop-down__menu">
                                        <li data-name="profile" class="drop-down__item" data-modal-target="editRecordModal{{$employee->id}}" data-modal-toggle="editRecordModal{{$employee->id}}">Edytuj</li>
                                        <li data-name="role" class="drop-down__item" data-modal-target="roleModal{{$employee->id}}" data-modal-toggle="roleModal{{$employee->id}}">Rola</li>

                                            @csrf
                                            @method('DELETE')
                                            <div class="flex items-center">
                                                <button type="submit" class="w-full">
                                                    <li data-name="dashboard" class="drop-down__item">Usuń</li>
                                                </button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- Edit modal -->
            <div id="editRecordModal{{$employee->id}}" tabindex="-1" aria-hidden="true" class="editRecordModal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                            <div id="roleModal{{$employee->id}}" class="modal fixed inset-0 flex items-center justify-center z-50 hidden">
                                <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75"></div>

                                <div class="modal-container bg-white w-full mx-auto rounded shadow-lg z-50 max-w-md">
                                  <div class="modal-content py-4 text-left px-6">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-3">
                                      <h2 class="text-xl font-bold">Zmień rolę pracownika</h2>
                                      <button class="modal-close cursor-pointer z-50">
                                        <svg class="fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                          <path
                                            d="M0 1.01L1.01 0 9 7.99 16.99 0 18 1.01 10.01 9l7.99 7.99L16.99 18 9 10.01 1.01 18 0 16.99 7.99 9 0 1.01z"
                                          ></path>
                                        </svg>
                                      </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="my-4">
                                        <form action="{{ route('pracownicy.changerole', $employee->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')

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
        @endforeach

        <script>
            $(document).ready(function() {
                $('[id^="dropdown"]').click(function() {
                    var dropdownId = $(this).attr('id');

                    // Check if the clicked dropdown is already active
                    var isActive = $(this).hasClass('drop-down--active');

                    // Close all dropdowns
                    $('.drop-down').removeClass('drop-down--active');

                    // Open the clicked dropdown if it was not active
                    if (!isActive) {
                        $(this).addClass('drop-down--active');
                    }
                });
            });
        </script>
        </tbody>
    </table>

    </div>
    </div>


    <!-- Main modal -->
    <div id="addClient" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Dodaj klienta
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6">
                    <form id="addForm" action="{{ route('pracownicy.store') }}" method="POST">
                        @csrf
                        <div class="p-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nazwa</label>
                            <input type="text" id="imie"  name="imie" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div class="p-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" id="imie"  name="imie" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>

                        <div class="pb-6 ps-6 pe-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wypłata</label>
                            <input type="text" id="nazwisko" name="nazwisko" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>


                        <div class=" p-6 flex items-center justify-center pt-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="defaultModal" type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    </body>
    </html>
