<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-4 px-3 h-full bg-white dark:bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-4">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <x-phosphor-magnifying-glass class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </div>
                <input type="text" name="search" id="sidebar-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search" />
            </div>
        </form>
        <ul class="space-y-2">
            <li>
                <x-branch-switch />
            </li>
            @foreach ($links as $item)
                <x-sidebar-link :text="$item['text'] ?? null" :link="$item['link'] ?? null" :icon="$item['icon'] ?? null" :divider="isset($item['divider'])"
                    :children="$item['children'] ?? []" />
            @endforeach
        </ul>
    </div>
</aside>
