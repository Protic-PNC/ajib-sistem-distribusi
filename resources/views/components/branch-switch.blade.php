<button id="branch-switch-button" data-dropdown-toggle="branch-switch"
    class="w-full p-2 rounded-lg flex items-center justify-between hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 dark:text-gray-400 dark:hover:bg-gray-700"
    type="button">
    <span class="sr-only">Open branch menu</span>
    <div class="flex items-center">
        <img src="{{ Vite::asset($branch['image_url']) }}" class="mr-3 h-6" alt="{{ $branch['name'] }}" />
        <div class="text-left">
            <div class="font-semibold whitespace-nowrap dark:text-white text-sm">
                {{ $branch['name'] }}
            </div>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $branch['description'] }}</div>
        </div>
    </div>
    <x-phosphor-caret-up-down class="w-5 h-5 text-gray-500 dark:text-gray-400" />
</button>
<div id="branch-switch" class="shadow-md bg-white rounded-md hidden z-10 w-60" data-popper-placement="bottom">
    @foreach ($branchList as $b)
        <a href="{{ $b['url'] }}"
            class="px-4 py-3 flex items-center hover:bg-gray-100 {{ $b['name'] == $branch['name'] ? 'bg-gray-50' : '' }}">
            <img src="{{ Vite::asset($b['image_url']) }}" class="mr-3 h-6" alt="{{ $b['name'] }}" />
            <div class="text-left">
                <div class="font-semibold whitespace-nowrap dark:text-white text-sm">
                    {{ $b['name'] }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $b['description'] }}</div>
            </div>
        </a>
    @endforeach
</div>
