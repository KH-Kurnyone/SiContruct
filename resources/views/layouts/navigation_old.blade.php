<aside id="sidebar" style="position: fixed; overflow-y: auto;"
    class="sidebar bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-50 shadow-lg dark:shadow-gray-500 w-72 fixed inset-y-0 left-0 transform -translate-x-full lg:hidden z-40 transition-all duration-500 ease-in-out">
    <div class="px-5 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="/img/MyLogoLight.png" alt="Logo" class="w-12 block dark:hidden">
                <img src="/img/MyLogoDark.png" alt="Logo" class="w-12 hidden dark:block">
                <h2 class="mx-1 lg:mx-2 text-lg font-bold">SICONTRUCT</h2>
            </div>
            <div class="lg:hidden hover:text-blue-500">
                <button id="closeSidebar">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </button>
            </div>
        </div>
        <div class="border border-gray-200 mt-4"></div>
        <ul class="mt-4">
            {{-- Dashboard --}}
            <li class="my-1">
                <a href="/dashboard"
                    class="block py-3 px-4 font-semibold {{ request()->is('dashboard') ? 'bg-yellow-100 dark:bg-opacity-40 border-l-4 border-yellow-500 -ms-1' : 'hover:bg-gray-100 dark:bg-opacity-10' }}">
                    <i class="fa-solid fa-house me-1"></i> Dashboard
                </a>
            </li>

            {{-- Master Data --}}
            <li class="my-1">
                <a href="#" id="master-data"
                    class="block py-3 px-4 font-semibold hover:bg-gray-100 dark:bg-opacity-10">
                    <div class="flex justify-between items-center">
                        <span>
                            <i class="fa-solid fa-database me-1" style="font-size: 18px"></i>
                            Master Data</span>
                        <i id="chevron-icon"
                            class="fas fa-chevron-down transition-transform duration-200 {{ request()->is('') ? 'rotate-180' : '' }}"></i>
                    </div>
                </a>
                <ul id="dropdown-menu"
                    class="hidden my-1 pl-4 transition-all duration-200 {{ request()->is('') ? 'max-h-screen overflow-hidden' : 'max-h-0 hidden overflow-hidden' }}">

                    <li class="my-1">
                        <a href=""
                            class="block py-2 px-3 {{ request()->is('') ? 'bg-slate-200' : 'hover:bg-gray-100 dark:bg-opacity-10' }}">
                            <i
                                class="fa-circle me-1 {{ request()->is('') ? 'fa-solid text-blue-800' : 'fa-regular' }}"></i>
                            Data 1
                        </a>
                    </li>
                    <li class="my-1">
                        <a href=""
                            class="block py-2 px-3 {{ request()->is('') ? 'bg-slate-200' : 'hover:bg-gray-100 dark:bg-opacity-10' }}">
                            <i
                                class="fa-circle me-1 {{ request()->is('') ? 'fa-solid text-blue-800' : 'fa-regular' }}"></i>
                            Data 2
                        </a>
                    </li>
                    <li class="my-1">
                        <a href=""
                            class="block py-2 px-3 {{ request()->is('') ? 'bg-slate-200' : 'hover:bg-gray-100 dark:bg-opacity-10' }}">
                            <i
                                class="fa-circle me-1 {{ request()->is('') ? 'fa-solid text-blue-800' : 'fa-regular' }}"></i>
                            Data 3
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Laporan --}}
            <li class="my-1">
                <a href="" class="block py-3 px-4 font-semibold hover:bg-gray-100 dark:bg-opacity-10">
                    <i class="fa-solid fa-file me-2" style="font-size: 18px"></i> Laporan
                </a>
            </li>
            {{-- Users --}}
            <li class="my-1">
                <a href="" class="block py-3 px-4 font-semibold hover:bg-gray-100 dark:bg-opacity-10">
                    <i class="fa-solid fa-users me-1" style="font-size: 15px"></i> Pengguna
                </a>
            </li>
            {{-- Profile --}}
            <li class="my-1">
                <a href="" class="block py-3 px-4 font-semibold hover:bg-gray-100 dark:bg-opacity-10">
                    <i class="fa-solid fa-address-card me-1" style="font-size: 18px"></i> Profil
                </a>
            </li>
            {{-- <li class="my-1 ">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </li> --}}
        </ul>
    </div>
</aside>
