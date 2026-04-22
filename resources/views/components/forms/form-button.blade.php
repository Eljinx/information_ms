@php
$baseClasses = 'font-semibold py-3 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800';

$variantClasses = match($variant) {
    'primary' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 text-white focus:ring-blue-500',
    'secondary' => 'bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white focus:ring-gray-500',
    'danger' => 'bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 text-white focus:ring-red-500',
    default => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
};

$widthClasses = $fullWidth ? 'w-full' : '';
@endphp

<button
    type="{{ $type }}"
    class="{{ $widthClasses }} {{ $baseClasses }} {{ $variantClasses }}"
>
    {{ $text }}
</button>
