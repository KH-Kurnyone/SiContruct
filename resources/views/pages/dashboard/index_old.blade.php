<title>SiContruct - Dashboard</title>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <section>
        <div class="sectionDashboard px-6 pt-6 pb-20 lg:ml-[285px] mt-16 bg-yellow-500 text-gray-50 transition-all duration-500 ease-in-out">
            <h1 class="text-2xl font-bold"><i class="fa-solid fa-house"></i> Dashboard</h1>
        </div>
        <div class="sectionDashboard px-6 lg:ml-[285px] bg-gray-100 dark:bg-gray-700 rounded-t-3xl -mt-5 relative transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-2 absolute right-5 left-5 -top-12">
                <div class="w-full shadow-md dark:shadow-gray-600 border dark:border-gray-500 px-6 py-10 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 rounded-lg">
                    Kotak 1
                </div>
                <div class="w-full shadow-md dark:shadow-gray-600 border dark:border-gray-500 px-6 py-10 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 rounded-lg">
                    Kotak 2
                </div>
                <div class="w-full shadow-md dark:shadow-gray-600 border dark:border-gray-500 px-6 py-10 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 rounded-lg">
                    Kotak 3
                </div>
                <div class="w-full shadow-md dark:shadow-gray-600 border dark:border-gray-500 px-6 py-10 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 rounded-lg">
                    Kotak 4
                </div>
            </div>
            <div class="text-transparent">-</div>
        </div>
    </section>

</x-app-layout>
