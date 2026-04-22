<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
    @if ($title || $subtitle)
        <div class="mb-8 text-center">
            @if ($title)
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    {{ $title }}
                </h2>
            @endif
            @if ($subtitle)
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    @endif

    {{ $slot }}
</div>
