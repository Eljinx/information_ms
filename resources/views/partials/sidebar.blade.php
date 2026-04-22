<aside class="hidden w-72 flex-none border-r border-slate-800 bg-slate-950 text-slate-100 lg:flex lg:min-h-screen">
    <div class="flex w-full flex-col">
        <div class="border-b border-slate-800 px-6 py-6">
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-emerald-300">Dashboard</p>
            <h2 class="mt-3 text-2xl font-bold">User CRUD Panel</h2>
            <p class="mt-2 text-sm text-slate-400">A proper left sidebar for your demo flow.</p>
        </div>

        <nav class="flex-1 space-y-2 px-4 py-6">
            <a
                href="{{ route('users.index') }}"
                class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('users.index') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}"
            >
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10">U</span>
                <span>User List</span>
            </a>

            <a
                href="{{ route('users.create') }}"
                class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('users.create') ? 'bg-white text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}"
            >
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10">+</span>
                <span>Create User</span>
            </a>
        </nav>

        <div class="border-t border-slate-800 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Talk Tip</p>
            <p class="mt-3 text-sm leading-6 text-slate-400">
                Demo list, create, view, edit, then delete to show the complete CRUD loop.
            </p>
        </div>
    </div>
</aside>
