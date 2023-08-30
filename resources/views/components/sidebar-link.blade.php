@if ($divider)
    <hr class="border-t border-gray-200 dark:border-gray-700" />
@elseif (count($children) > 0)
    <button type="button"
        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-primary-50 dark:text-white dark:hover:bg-primary-500"
        aria-controls="dropdown-{{ $id }}" data-collapse-toggle="dropdown-{{ $id }}">
        @svg('phosphor-' . $icon, 'w-5 h-5 dark:text-white dark:group-hover:text-white text-gray-500 group-hover:text-gray-900')
        <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $text }}</span>
        <x-phosphor-caret-down-bold class="w-5 h-5 text-gray-500 dark:text-gray-400" />
    </button>
    <ul id="dropdown-{{ $id }}" class="{{ $isChildrenActive() ? 'block' : 'hidden' }} py-2 space-y-2">
        @foreach ($children as $item)
            @php
                $isActive = $matchCurrentRoute($item['link']);
            @endphp

            <li>
                <a {{ \Illuminate\Support\Arr::get($item, 'external') ? '' : 'wire:navigate' }}
                    href="{{ $item['link'] }}"
                    class="{{ clsx([
                        'flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group dark:text-white dark:hover:bg-primary-100',
                        'text-white bg-primary-500' => $isActive,
                        'text-gray-900 hover:bg-primary-50' => !$isActive,
                    ]) }}">
                    {{ $item['text'] }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    @php
        $isActive = $matchCurrentRoute($link);
    @endphp

    <a {{ $external ? '' : 'wire:navigate' }}
        {{ $attributes->merge([
            'href' => $link,
            'class' => clsx([
                'flex items-center p-2 text-base font-medium rounded-lg dark:text-white group',
                'text-white bg-primary-500' => $isActive,
                'text-gray-900 hover:bg-primary-50' => !$isActive,
            ]),
        ]) }}>
        @svg('phosphor-' . $icon, clsx(['w-5 h-5 dark:text-white dark:group-hover:text-white', 'text-white group-hover:text-white' => $isActive, 'text-gray-500 group-hover:text-gray-900' => !$isActive]))
        <span class="ml-3">{{ $text }}</span>
    </a>
@endif
