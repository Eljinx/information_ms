<div class="flex flex-col gap-4 rounded-3xl bg-gradient-to-r from-slate-900 to-emerald-700 p-8 text-white shadow-xl md:flex-row md:items-end md:justify-between">
    <div>
        @if ($badge)
            <p class="text-sm uppercase tracking-[0.3em] text-emerald-200">{{ $badge }}</p>
        @endif
        <h1 class="mt-2 text-3xl font-bold">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-3 max-w-2xl text-sm text-slate-200">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    {{ $slot }}
</div>
