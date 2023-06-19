@extends('layouts.app')
<title>Podsumowania</title>
@section('content')

    <table class="w-full text-left transition-opacity ease-in-out duration-100">
        <thead>
        <tr class="text-black">
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Ilość wypożyczeń</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Zysk z wypożyczeń</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Ilość odbiorów</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Ilość uszkodzonych hulajnóg</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Koszt uszkodzeń</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200">Akcje</th>
        </tr>
        </thead>
        <tbody class="text-gray-500">
        @foreach($podsumowania as $podsumowanie)
            <tr class="hover:bg-zinc-600 hover:bg-opacity-10 transition-colors duration-300 ease-in-out">
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        {{$podsumowanie->ilosc_wypozyczen}}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        {{$podsumowanie->koszt}}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        {{$podsumowanie->ilosc_odbiorow}}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        {{$podsumowanie->liczba_uszkodzonych}}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        {{ $podsumowanie->koszt_uszkodzen}}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200">
                    <div class="flex items-center">
                        <form action="{{ route('podsumowania.destroy', $podsumowanie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Usuń</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Przycisk dodawania podsumowania -->
    <button id="openModal" class="fixed top-4 right-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj podsumowanie</button>

    <!-- Modal dodawania podsumowania -->
    <div id="addPodsumowanie" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow w-full max-w-md p-4">
            <!-- Modal content -->
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Dodaj podsumowanie
                    </h3>
                    <button type="button" data-modal-hide="addPodsumowanie" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-1 p-4">
                    <form action="{{ route('podsumowania.store') }}" method="POST">
                        @csrf
                        <label for="selected_date">Wybierz datę:</label>
                        <input type="date" id="selected_date" name="selected_date" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-400 focus:ring-blue-400">
                        <div class="flex items-center justify-end mt-4">
                            <button data-modal-hide="addPodsumowanie" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-auto">Dodaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('addPodsumowanie').classList.remove('hidden');
        });

        function hideModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
        modalHideButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-hide');
                hideModal(modalId);
            });
        });
    </script>
@endsection
