<nav
    class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-1 md:p-2 mr-2 text-gray-600 rounded-md md:rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <x-phosphor-list class="w-5 h-5 md:w-6 md:h-6" />
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="/" class="flex items-center justify-between mr-4">
                <span
                    class="self-center md:text-2xl text-xl font-semibold whitespace-nowrap dark:text-white">Distribusi</span>
            </a>
            <form action="#" method="GET" class="hidden md:block md:pl-2">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="relative md:w-64 md:w-96">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <x-phosphor-magnifying-glass class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                    </div>
                    <input type="text" name="email" id="topbar-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search" />
                </div>
            </form>
        </div>
        <div class="flex items-center lg:order-2">
            <!-- Notifications -->
            <button type="button" data-dropdown-toggle="notification-dropdown"
                class="md:p-2 p-1 mr-1 text-gray-500 rounded-md md:rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">View notifications</span>
                <x-phosphor-bell-simple-fill class="w-5 h-5 md:w-6 md:h-6" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                id="notification-dropdown">
                <div
                    class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                    Notifikasi
                </div>
                <div>
                    <a href="#"
                        class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                alt="Bonnie Green avatar" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700 text-white">
                                <x-phosphor-envelope-fill class="w-3 h-3" />
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                New message from
                                <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>:
                                "Hey, what's up? All set for the presentation?"
                            </div>
                            <div class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                a few moments ago
                            </div>
                        </div>
                    </a>
                </div>
                <a href="#"
                    class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
                    <div class="inline-flex items-center">
                        <x-phosphor-eye-fill class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" />
                        Lihat semua
                    </div>
                </a>
            </div>
            <!-- Apps -->
            <button type="button" data-dropdown-toggle="apps-dropdown"
                class="p-1 md:p-2 text-gray-500 rounded-md md:rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">View notifications</span>
                <!-- Icon -->
                <x-phosphor-squares-four-fill class="w-5 h-5 md:w-6 md:h-6" />
            </button>
            <!-- Dropdown menu -->
            <x-app-menu id="apps-dropdown" />
            <button type="button"
                class="flex md:mx-3 ml-2 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-7 h-7 md:w-8 md:h-8 rounded-full"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                    alt="user photo" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</span>
                    <span class="block text-sm text-gray-900 truncate dark:text-white">name@flowbite.com</span>
                </div>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white flex">
                            <x-phosphor-user-fill class="mr-2 w-5 h-5 text-gray-400" />
                            My profile
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white flex">
                            <x-phosphor-gear-fill class="mr-2 w-5 h-5 text-gray-400" />
                            Settings
                        </a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('sso.logout') }}"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
