<header class="border-b border-slate-200 bg-white/90 shadow-sm backdrop-blur">
    <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div>
            <a href="{{ route('users.index') }}" class="text-lg font-semibold tracking-tight text-slate-900">
                {{ config('app.name') }}
            </a>
            <p class="text-sm text-slate-500">User management demonstration</p>
        </div>

        <nav class="flex items-center gap-3 text-sm font-medium lg:hidden">
            <a
                href="{{ route('users.index') }}"
                class="rounded-lg px-4 py-2 transition {{ request()->routeIs('users.index') ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
            >
                Users
            </a>
            <a
                href="{{ route('users.create') }}"
                class="rounded-lg bg-slate-900 px-4 py-2 text-white transition hover:bg-slate-700"
            >
                Add User
            </a>
        </nav>
    </div>
</header>
