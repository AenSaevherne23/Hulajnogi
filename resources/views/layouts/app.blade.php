<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Placowki </title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/css/navbar.css" rel="stylesheet"/>
    <link href="/css/dropdown.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<body class="bg-gradient-to-r from-purple-800 via-indigo-600 to-purple-800">
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-menu'></i>
        <span class="logo_name">Hulajnogi</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Category</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">Category</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Category</a></li>
                <li><a href="#">HTML & CSS</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">PHP & MySQL</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">Posts</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Posts</a></li>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Login Form</a></li>
                <li><a href="#">Card Design</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link_name">Analytics</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Analytics</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-line-chart' ></i>
                <span class="link_name">Chart</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Chart</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-plug' ></i>
                    <span class="link_name">Plugins</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Plugins</a></li>
                <li><a href="#">UI Face</a></li>
                <li><a href="#">Pigments</a></li>
                <li><a href="#">Box Icons</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-compass' ></i>
                <span class="link_name">Explore</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Explore</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-history'></i>
                <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">History</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="link_name">Settings</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Settings</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="/images/totallyImportant.jpg" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">{{ Auth::user()->name }}</div>
                    <div class="job">otaku retard</div>
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
<section class="home-section">
    <div class="overlay-button">
    </div>
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">

        <div class="flex-grow overflow-hidden h-full flex flex-col">

            <div class="flex-grow flex overflow-x-hidden">

                <div class="flex-grow border-gray-200  dark:bg-gray-900 overflow-y-auto">

                    @yield("content")
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
