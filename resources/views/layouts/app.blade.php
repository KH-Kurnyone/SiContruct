<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="/img/APP_SIRP_2.png" rel="icon">
    <link href="/img/APP_SIRP_2.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!--Icons Cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--Flowbite Cdn CSS-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--Link CSS-->
    <link rel="stylesheet" href="/css/style.css">

    {{-- CDN Grafik --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Style minimalis untuk scrollbar */
        .minimal-scroll {
            overflow-y: scroll;
        }

        .minimal-scroll::-webkit-scrollbar {
            width: 6px;
            /* Lebar scrollbar */
        }

        .minimal-scroll::-webkit-scrollbar-thumb {
            background-color: #c4c4c4;
            /* Warna thumb scrollbar */
            border-radius: 10px;
            /* Membuat ujung thumb bulat */
        }

        .minimal-scroll::-webkit-scrollbar-thumb:hover {
            background-color: #a1a1a1;
            /* Warna thumb saat hover */
        }

        .minimal-scroll::-webkit-scrollbar-track {
            background-color: #f4f4f4;
            /* Warna track scrollbar */
            border-radius: 10px;
            /* Membuat ujung track bulat */
        }

        @media (min-width: 1024px) {
            .translate-x {
                transform: translateX(0);
            }

            .margin-lg {
                margin-left: 288px;
            }
        }
    </style>
</head>

<body class="font-sans antialiased transition-all duration-500 ease-in-out bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-50 minimal-scroll">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <div class="flex-1">
            @isset($header)
                <header class="flex px-5 py-3 bg-yellow-500 fixed w-full top-0 z-20 transition-all duration-300 ease-in-out" id="header">
                    <!-- Hamburger Button -->
                    <button id="hamburger"
                        class="lg:ms-72 me-3 text-gray-50 hover:text-gray-300 transition-all duration-500 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>

                    <button id="theme-toggle" class="text-gray-50 hover:text-gray-300">
                        <i id="theme-icon" class="fas fa-moon text-lg"></i>
                    </button>

                    <div class="flex items-center">
                        {{-- <img src="/img/APP_SIRP_2.png" alt="logo_sirp" class="w-[35px] sm:w-[40px] lg:ms-72"> --}}
                        {{-- <h2 class="mx-1 lg:mx-2 text-lg font-semibold lg:ms-72">LP3I Computer Club</h2> --}}
                    </div>
                    <div class="flex-1 flex justify-end">
                        <a href="#" id="dropdownH"
                            class="flex text-gray-50 hover:text-gray-300 justify-end items-center">
                            <div>
                                <div class="font-semibold text-sm">Khikmal Kurniawan</div>
                                <div class="text-[11px] text-right mt-[-3px]">
                                    Super Administrator
                                </div>
                            </div>
                            <img src="/img/profile.png" alt="profile" class="w-10 rounded-full mx-2">
                            <i class="fas fa-chevron-down transition-transform duration-300" id="chevronH"></i>
                        </a>
                    </div>

                    {{-- Dropdown Header --}}
                    <div id="cardH"
                        class="hidden opacity-0 transition-opacity duration-300 bg-gray-50 text-gray-900 dark:bg-gray-700 dark:text-gray-50 shadow-md border border-gray-200 pt-4 rounded-xl z-50"
                        style="position: absolute; top: 60px; right: 10px; z-index: 1000;">
                        <div class="mx-12 text-center">
                            <div class="font-semibold">{{ Auth()->user()->name }}</div>
                            <div class="text-sm">
                                Super Admin
                            </div>
                        </div>
                        <div class="border border-gray-200 mt-4 w-full"></div>
                        <a href="/profile">
                            <div class="mx-5 my-2 hover:text-blue-500"><i class="bi bi-person"></i> Profile</div>
                        </a>
                        <div class="border border-gray-200 w-full"></div>
                        <a href="#" data-modal-target="logoutAdmin" data-modal-toggle="logoutAdmin">
                            <div class="mx-5 my-2 hover:text-blue-500 mb-3">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </div>
                        </a>
                    </div>
                </header>

                {{-- Modal Logout --}}
                <div id="logoutAdmin" tabindex="-1" aria-hidden="true"
                    class="zoom hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[70] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-lg max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-gray-50 text-gray-900 dark:bg-gray-700 dark:text-gray-50 rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg sm:text-xl font-semibold text-red-500">
                                    <i class="fa-solid fa-circle-info"></i> INFORMASI
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="logoutAdmin">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 text-center sm:text-base text-sm">
                                    Apakah anda yakin akan keluar dari website SIRP?
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button type="submit"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                        class="py-2 px-10 sm:text-base text-sm rounded-md bg-red-500 hover:bg-red-400 transition text-white">Ya,
                                        Keluar
                                        <i class="bi bi-arrow-right"></i></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- <script src="/js/script.js"></script> --}}
    {{-- <script src="/javaScript/script.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>
        const header = document.getElementById("header");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 5) {
                header.classList.add("shadow-md");
                header.classList.add("dark:shadow-gray-300");
            } else {
                header.classList.remove("shadow-md");
                header.classList.remove("dark:shadow-gray-300");
            }
        });

        //JavaScript untuk membuka/tutup sidebar
        const sidebar = document.getElementById("sidebar");
        const hamburger = document.getElementById("hamburger");
        const closeSidebar = document.getElementById("closeSidebar");
        const sectionDashboards = document.querySelectorAll(".sectionDashboard");

        function toggleSidebar() {
            sidebar.classList.toggle("-translate-x-full");
            if (window.innerWidth >= 1024) {
                // hamburger.classList.toggle("lg:ms-72");
                // hamburger.classList.toggle("lg:ms-0");
                if (hamburger.classList.contains("lg:ms-72")) {
                    hamburger.classList.remove("lg:ms-72");
                    hamburger.classList.add("lg:ms-0");

                    // Ganti durasi animasi ke 300ms
                    hamburger.classList.remove("duration-500");
                    hamburger.classList.add("duration-300");
                } else {
                    hamburger.classList.remove("lg:ms-0");
                    hamburger.classList.add("lg:ms-72");

                    // Ganti durasi animasi ke 500ms
                    hamburger.classList.remove("duration-300");
                    hamburger.classList.add("duration-500");
                }
            }
            sectionDashboards.forEach(section => {
                if (window.innerWidth >= 1024) {
                    if (section.classList.contains("lg:ml-[285px]")) {
                        section.classList.remove("lg:ml-[285px]");
                        section.classList.add("lg:ml-0");

                        // Ganti durasi animasi ke 300ms
                        section.classList.remove("duration-500");
                        section.classList.add("duration-[250ms]");
                    } else {
                        section.classList.remove("lg:ml-0");
                        section.classList.add("lg:ml-[285px]");

                        // Ganti durasi animasi ke 500ms
                        section.classList.remove("duration-[250ms]");
                        section.classList.add("duration-500");
                    }
                }
            });
            // if (window.innerWidth >= 1024) {
            //     sectionDashboards.forEach(section => {
            //         section.classList.toggle("lg:ml-[285px]");
            //         section.classList.toggle("lg:ml-0");
            //     });
            // }
        }

        // Fungsi untuk menutup sidebar di layar lg
        function closeSidebarOnResize() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove("-translate-x-full"); // Pastikan sidebar tetap terbuka di layar besar
                sidebar.classList.remove("lg:hidden");
            } else {
                sidebar.classList.add("-translate-x-full"); // Tutup sidebar di layar kecil jika sebelumnya terbuka
                sidebar.classList.add("lg:hidden");
            }
        }

        // Event listener untuk klik hamburger
        hamburger.addEventListener("click", toggleSidebar);
        // Event listener untuk perubahan ukuran layar
        window.addEventListener("resize", closeSidebarOnResize);
        // Pastikan sidebar tertutup saat pertama kali di layar kecil
        closeSidebarOnResize();

        // Menutup sidebar ketika tombol closeSidebar diklik
        if (closeSidebar) {
            closeSidebar.addEventListener("click", () => {
                sidebar.classList.add("-translate-x-full");

                // Pastikan class "lg:ms-72" dikembalikan jika sidebar tertutup di layar lg
                if (window.innerWidth >= 1024) {
                    hamburger.classList.add("lg:ms-72");
                    hamburger.classList.add("lg:ms-0");
                }
                sectionDashboards.forEach(section => {
                    if (window.innerWidth >= 1024) {
                        section.classList.add("lg:ml-[285px]");
                        section.classList.remove("lg:ml-0");
                    }
                });
            });
        }

        // Dropdown Header
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownHeader = document.getElementById("dropdownH");
            const cardHeader = document.getElementById("cardH");
            const chevronHeader = document.getElementById("chevronH");

            dropdownHeader.addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah perilaku default tautan
                const isHidden = cardHeader.classList.contains("hidden");

                if (isHidden) {
                    cardHeader.classList.remove("hidden");
                    setTimeout(() => {
                        cardHeader.classList.remove("opacity-0");
                    }, 10); // Delay for the fade-in effect
                    // chevronHeader.classList.remove("fa-chevron-down");
                    // chevronHeader.classList.add("fa-chevron-up");
                    chevronHeader.classList.add("rotate-180"); // Rotate chevron
                } else {
                    cardHeader.classList.add("opacity-0");
                    setTimeout(() => {
                        cardHeader.classList.add("hidden");
                    }, 300); // Delay for the fade-out effect
                    // chevronHeader.classList.remove("fa-chevron-up");
                    // chevronHeader.classList.add("fa-chevron-down");
                    chevronHeader.classList.remove("rotate-180"); // Reset rotation
                }
            });
        });

        //Dropdown Master Data
        document
            .getElementById("master-data")
            .addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Toggle dropdown menu
                const dropdown = document.getElementById("dropdown-menu");
                const icon = document.getElementById("chevron-icon");

                if (dropdown.classList.contains("hidden")) {
                    // If the dropdown is hidden, we open it
                    dropdown.classList.remove("hidden");
                    dropdown.style.maxHeight = dropdown.scrollHeight + "px"; // Set maxHeight for animation
                    // Change icon to up
                    icon.classList.add("rotate-180");
                } else {
                    // If the dropdown is open, we close it
                    dropdown.style.maxHeight = "0"; // Set maxHeight to 0 for closing animation
                    // Change icon to down
                    icon.classList.remove("rotate-180");
                    // Wait for the closing animation to finish before hiding it completely
                    dropdown.addEventListener(
                        "transitionend",
                        function() {
                            dropdown.classList.add("hidden"); // Add hidden class after the transition
                        }, {
                            once: true
                        }
                    ); // Ensure the event is only fired once
                }
            });
    </script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themeToggle = document.getElementById("theme-toggle");
            const themeIcon = document.getElementById("theme-icon");
            const htmlElement = document.documentElement;

            // Cek localStorage untuk menyimpan preferensi pengguna
            if (localStorage.getItem("theme") === "dark") {
                htmlElement.classList.add("dark");
                themeIcon.classList.replace("fa-moon", "fa-sun");
            }

            themeToggle.addEventListener("click", function() {
                htmlElement.classList.toggle("dark");
                const isDark = htmlElement.classList.contains("dark");

                // Simpan preferensi tema di localStorage
                localStorage.setItem("theme", isDark ? "dark" : "light");

                // Ubah ikon
                if (isDark) {
                    themeIcon.classList.replace("fa-moon", "fa-sun");
                } else {
                    themeIcon.classList.replace("fa-sun", "fa-moon");
                }
            });
        });
    </script>

</body>

</html>
