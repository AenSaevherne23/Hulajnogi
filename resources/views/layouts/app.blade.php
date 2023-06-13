<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ '/css/navbar.css' }}" rel="stylesheet"/>
    <link href="{{'/css/dropdown.css' }}" rel="stylesheet"/>
    <link href="{{ asset('../public/css/navbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('../public/css/dropdown.css') }}" rel="stylesheet"/>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pl.js"></script>

</head>
<body class="bg-gray-100">
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-menu'></i>
        <span class="logo_name">Hulajnogi</span>
    </div>
    <div class="pt-12">
    <ul class="nav-links">
        <li>
            <a href="{{ route('placowki.index') }}">
                <i class="bx bx-home"></i>
                <span class="link_name">Placowki</span>
            </a>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#{{--{{ route('users.index') }}--}}">
                    <i class="bx bx-group"></i>
                    <span class="link_name">Uzytkownicy</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Category</a></li>
                <li><a href="{{ route('pracownicy.index') }}">Pracownicy</a></li>
                <li><a href="{{ route('klienci.index') }}">Klienci</a></li>
                <li><a href="{{ route('kierownicy.index') }}">Kierownicy</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('hulajnogi.index') }}">
                <i class="bx bx-map"></i>
                <span class="link_name">Hulajnogi</span>
            </a>
        </li>

        <li>
            <a href="{{ route('wypozyczenia.index') }}">
                <i class='bx bx-calendar'></i>
                <span class="link_name">Wypożyczenia</span>
            </a>
        </li>

        <li>
            <a href="{{ route('rewizje.index') }}">
                <i class="bx bx-file"></i>
                <span class="link_name">Rewizje</span>
            </a>
        </li>
        <li>
            <a href="{{ route('odbiory.index') }}">
                <i class="bx bx-dollar"></i>
                <span class="link_name">Odbiory</span>
            </a>
        </li>
        <li>

        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="/images/totallyImportant.jpg" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">{{ optional(Auth::user())->name }}</div>
                    <div class="job"></div>
                </div>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out' ></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    </div>
</div>
<section class="home-section">
    <div class="overlay-button">
    </div>
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">

        <div class="flex-grow overflow-hidden h-full flex flex-col">

            <div class="flex-grow flex overflow-x-hidden">

                <div class="flex-grow border-gray-200  dark:bg-gray-900 overflow-y-hidden">
                    <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">


                        @php
                            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
                        @endphp

                        @if($currentRoute === 'placowki.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Placowki
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500 text-white hover:bg-blue-700 transition-all duration-300" data-modal-target="defaultModal" data-modal-toggle="defaultModal">Dodaj placówkę</button>
                            </div>
                        @elseif($currentRoute === 'hulajnogi.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Hulajnogi
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="hulajnogiModal" data-modal-toggle="hulajnogiModal">Dodaj hulajnoge</button>
                            </div>
                        @elseif($currentRoute === 'users.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Uzytkownicy
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500"  data-modal-target="addEmployee" data-modal-toggle="addEmployee">Dodaj uzytkownika</button>
                            </div>
                        @elseif($currentRoute === 'klienci.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Klienci
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addClient" data-modal-toggle="addClient">Dodaj klienta</button>
                            </div>
                        @elseif($currentRoute === 'pracownicy.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Pracownicy
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addClient" data-modal-toggle="addClient">Dodaj pracownika</button>
                            </div>
                        @elseif($currentRoute === 'kierownicy.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Kierownicy
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addClient" data-modal-toggle="addClient">Dodaj kierownika</button>
                            </div>
                        @elseif($currentRoute === 'wypozyczenia.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Wypożyczenia
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addWypozyczenie" data-modal-toggle="addWypozyczenie">Dodaj wypożyczenie</button>
                            </div>
                        @elseif($currentRoute === 'rewizje.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Rewizje
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addRewizje" data-modal-toggle="addRewizje">Dodaj rewizje</button>
                            </div>
                        @elseif($currentRoute === 'odbiory.index')
                            <div class="flex h-full text-gray-600 dark:text-gray-400">
                                <a href="#" class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">
                                    Odbiory
                                </a>
                            </div>
                            <div class="ml-auto flex items-center space-x-7">
                                <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500" data-modal-target="addOdbior" data-modal-toggle="addOdbior">Dodaj odbiór</button>
                            </div>
                        @endif

                    </div>
                    <div class="flex-grow overflow-hidden h-full flex flex-col">
                        <div class="sm:p-7 p-4 overflow-y-auto">
                    <div class="flex w-full items-center mb-7 ">
                        <button class="inline-flex mr-3 items-center h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 bg-white leading-none py-0">
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
                        <button class="inline-flex items-center bg-white h-8 pl-2.5 pr-2 rounded-md shadow text-gray-700 dark:text-gray-400 dark:border-gray-800 border border-gray-200 leading-none py-0">
                            Filter by
                            <svg viewBox="0 0 24 24" class="w-4 ml-1.5 text-gray-400 dark:text-gray-600" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="ml-auto text-gray-500 text-xs sm:inline-flex hidden items-center">
                            <span class="mr-3">Page 1 of 4</span>
                            <button class="inline-flex mr-2 items-center bg-white h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="inline-flex items-center  bg-white h-8 w-8 justify-center text-gray-400 rounded-md shadow border border-gray-200 dark:border-gray-800 leading-none py-0">
                                <svg class="w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                            <div class="pb-20">

                    @yield("content")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement; // selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
        sidebarBtn.classList.toggle("translated");
    });
</script>

</body>
</html>
