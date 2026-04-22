<div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
    <table {{ $attributes->merge(['class' => 'display stripe w-full']) }} id="{{ $id }}">
        <thead>
            {{ $slot }}
        </thead>
    </table>
</div>
