<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value ?? old($name) }}"
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @if ($required) required @endif
        @if ($autofocus) autofocus @endif
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border {{ $errors->has($name) ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 dark:border-gray-600 focus:ring-blue-500' }} rounded-lg focus:outline-none focus:ring-2 focus:border-transparent dark:text-white transition-all"
    />
    
    @error($name)
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    @if ($hint)
        <p class="text-gray-500 dark:text-gray-400 text-xs mt-2">{{ $hint }}</p>
    @endif
</div>
