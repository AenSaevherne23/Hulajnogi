@extends('layouts.app')

@section('content')
    <div class="flex-grow overflow-hidden h-full flex flex-col">
        <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
            <div class="flex h-full text-gray-600 dark:text-gray-400">
                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Placówki</a>
            </div>
            <div class="ml-auto flex items-center space-x-7">
                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="defaultModal" data-modal-toggle="defaultModal"   >Dodaj placówke</button>


            </div>
        </div>
    <div class="sm:p-7 p-4">

        <div class="flex w-full items-center mb-7">
            <button class="inline-flex mr-3 items-center h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 leading-none py-0">
                <svg viewBox="0 0 24 24" class="w-4 mr-2 text-gray-400 dark:text-gray-600" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Last 30 days
                <svg viewBox="0 0 24 24" class="w-4 ml-1.5 text-gray-400 dark:text-gray-600" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <button class="inline-flex items-center h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 leading-none py-0">
                Filter by
                <svg viewBox="0 0 24 24" class="w-4 ml-1.5 text-gray-400 dark:text-gray-600" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="ml-auto text-gray-500 text-xs sm:inline-flex hidden items-center">
                <span class="mr-3">Page 2 of 4</span>
                <button class="inline-flex mr-2 items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                    <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                    <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        <table class="w-full text-left">
            <thead>
            <tr class="text-gray-400">
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Nazwa</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Adres</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800 sm:text-gray-400 text-white">Data dodania</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-100">
            @foreach($placowki as $placowka)

                <tr>
                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-center">
                            <svg viewBox="0 0 24 24" class="w-4 mr-5 text-yellow-500" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            {{$placowka->nazwa}}
                        </div>
                    </td>
                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" class="w-7 h-7 p-1.5 mr-2.5 rounded-lg border border-gray-200 dark:border-gray-800">
                                <path fill="#03a9f4" d="M425.457 117.739c-3.121-1.838-6.961-1.966-10.197-.341-3.231 1.629-5.416 4.786-5.803 8.384-.384 3.499-.981 6.997-1.728 10.667-20.885 94.784-62.827 140.885-128.256 140.885h-96c-5.062.009-9.42 3.574-10.432 8.533l-32 149.995-5.717 38.187c-3.287 17.365 8.125 34.107 25.489 37.394 1.915.362 3.858.549 5.807.558h64.213c14.718.045 27.55-10 31.04-24.299l25.941-103.701h55.659c65.685 0 111.083-52.373 127.829-147.477 11.054-45.286-7.234-92.668-45.845-118.785z" />
                                <path fill="#283593" d="M405.339 38.017C384.261 14.108 354.012.286 322.139.001h-176.64C119.064-.141 96.558 19.2 92.721 45.355L37.873 411.243c-2.627 17.477 9.41 33.774 26.887 36.402 1.586.239 3.189.357 4.793.356h81.92c5.062-.009 9.42-3.574 10.432-8.533l30.187-140.8h87.467c75.904 0 126.059-53.056 149.099-157.867.926-4.178 1.638-8.4 2.133-12.651 5.348-32.335-3.981-65.372-25.452-90.133z" />
                            </svg>
                            {{$placowka->adres}}
                        </div>
                    </td>
                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-center">
                            <div class="sm:flex hidden flex-col">
                                {{$placowka->updated_at->format('Y-m-d')}}
                            </div>
                            <button data-modal-target="editRecordModal{{$placowka->id}}" data-modal-toggle="editRecordModal{{$placowka->id}}"  class="w-8 h-8 inline-flex items-center justify-center text-gray-400 ml-auto">
                                <svg viewBox="0 0 24 24" class="w-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </button>

                        </div>
                    </td>
                </tr>
                <!-- Main modal -->
                <div id="editRecordModal{{$placowka->id}}" tabindex="-1" aria-hidden="true" class="editRecordModal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Dodaj placówke
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-bs-dismiss="modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="space-y-6">
                                <form action="{{ route('placowki.update', $placowka->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="p-6">
                                        <label for="edit_nazwa{{$placowka->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nazwa</label>
                                        <input type="text" id="edit_nazwa{{$placowka->id}}" value="{{$placowka->nazwa}}" name="nazwa" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div class="pb-6 ps-6 pe-6">
                                        <label for="edit_adres{{$placowka->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adres</label>
                                        <input type="text" id="edit_adres{{$placowka->id}}" value="{{$placowka->adres}}" name="adres" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div class="p-6 flex items-center justify-center pt-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dodaj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </tbody>
        </table>
        <div class="flex w-full mt-5 space-x-2 justify-end">
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">
                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">1</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white leading-none">2</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">3</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-500 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">4</button>
            <button class="inline-flex items-center h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none">
                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </div>
    </div>
@endsection


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Dodaj placówke
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-6">
                <form action="{{ route('placowki.store') }}" method="POST">
                    @csrf
                <div class="p-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nazwa</label>
                    <input type="text" id="nazwa"  name="nazwa" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                    <div class="pb-6 ps-6 pe-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adres</label>
                    <input type="text" id="adres" name="adres" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                    <div class=" p-6 flex items-center justify-center pt-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="defaultModal" type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
