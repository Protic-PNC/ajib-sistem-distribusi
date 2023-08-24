<div
    {{ $attributes->merge(['class' => 'hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 rounded-xl']) }}>
    <div
        class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
        Menu
    </div>
    <div class="grid grid-cols-3 gap-4 p-4">
        @foreach ($appList as $app)
            <a href="{{ $app['url'] }}"
                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                @svg('phosphor-' . $app['icon'], 'mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400')
                <div class="text-sm text-gray-900 dark:text-white">{{ $app['name'] }}</div>
            </a>
        @endforeach
    </div>
</div>
