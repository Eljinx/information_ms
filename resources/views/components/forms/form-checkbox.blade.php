<div class="mb-6">
    <label class="flex items-center space-x-2 cursor-pointer">
        <input
            type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            @if ($checked || old($name)) checked @endif
            class="w-4 h-4 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-blue-500 cursor-pointer"
        />
        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
    </label>
    
    @error($name)
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
