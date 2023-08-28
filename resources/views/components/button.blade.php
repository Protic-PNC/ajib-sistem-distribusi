@props(['color' => 'blue', 'pill' => false, 'href' => null, 'size' => 'base', 'variant' => 'normal', 'icon'])

@php
    $colors = [
        'normal' => [
            'blue' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-200 disabled:bg-blue-400/50',
            'green' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-200 disabled:bg-green-400/50',
            'red' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-200 disabled:bg-red-400/50',
            'yellow' => 'text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-200 disabled:bg-yellow-400/50',
            'purple' => 'text-white bg-purple-600 hover:bg-purple-700 focus:ring-purple-200 disabled:bg-purple-400/50',
            'light' => 'text-gray-900 bg-white hover:bg-gray-100 focus:ring-gray-200 disabled:bg-gray-100 disabled:text-gray-900/50',
        ],
        'ghost' => [
            'blue' => 'text-blue-500 hover:bg-blue-100 disabled:bg-transparent disabled:text-blue-500/50',
            'green' => 'text-green-500 hover:bg-green-100 disabled:bg-transparent disabled:text-green-500/50',
            'red' => 'text-red-500 hover:bg-red-100 disabled:bg-transparent disabled:text-red-500/50',
            'yellow' => 'text-yellow-400 hover:bg-yellow-100 disabled:bg-transparent disabled:text-yellow-400/50',
            'purple' => 'text-purple-600 hover:bg-purple-100 disabled:bg-transparent disabled:text-purple-600/50',
            'light' => 'text-gray-500 hover:text-gray-900 hover:bg-gray-100 disabled:bg-transparent disabled:text-gray-500/50',
        ],
    ];
    
    $spaces = [
        'icon' => [
            'xs' => 'p-1',
            'sm' => 'p-2',
            'base' => 'p-2.5',
            'lg' => 'p-2.5',
            'xl' => 'p-2.5',
        ],
        'default' => [
            'xs' => 'px-2 py-1',
            'sm' => 'px-3 py-2',
            'base' => 'px-5 py-2.5',
            'lg' => 'px-5 py-3',
            'xl' => 'px-6 py-3.5',
        ],
    ];
    
    $sizes = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-sm',
        'lg' => 'text-base',
        'xl' => 'text-base',
    ];
    
    $radius = [
        'xs' => 'rounded-md',
        'sm' => 'rounded-md',
        'base' => 'rounded-lg',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-lg',
    ];
    
    $variantColors = $colors[$variant] ?? $colors['normal'];
    $colorClasses = $variantColors[$color] ?? $variantColors['blue'];
    $spaceSet = isset($icon) && $slot->isEmpty() ? $spaces['icon'] : $spaces['default'];
    $spaceClasses = $spaceSet[$size] ?? $spaceSet['base'];
    $sizeClasses = $sizes[$size] ?? $sizes['base'];
    $pillClasses = $pill ? 'rounded-full' : $radius[$size];
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge([
        'type' => 'button',
        'class' => clsx([
            'font-medium text-center focus:outline-none inline-flex items-center',
            'focus:ring-4' => $variant === 'normal',
            'cursor-not-allowed' => $attributes->has('disabled'),
            $colorClasses,
            $spaceClasses,
            $sizeClasses,
            $pillClasses,
        ]),
    ]) }}>
    @isset($icon)
        {{ $icon }}
    @endisset
    {{ $slot }}
    </{{ $tag }}>
