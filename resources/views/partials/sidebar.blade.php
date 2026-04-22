<aside class="hidden w-72 flex-none border-r border-slate-800 bg-slate-950 text-slate-100 lg:flex lg:fixed lg:inset-y-0 lg:left-0 lg:z-40">
    <div class="flex w-full flex-col h-screen">
        <div class="border-b border-slate-800 px-6 py-6 flex-shrink-0">
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-emerald-300">Dashboard</p>
            <h2 class="mt-3 text-2xl font-bold">User CRUD Panel</h2>
            <p class="mt-2 text-sm text-slate-400">A proper left sidebar for your demo flow.</p>
        </div>

        <nav class="flex-1 space-y-2 px-4 py-6 overflow-y-auto">
            <a
                href="{{ route('users.index') }}"
                class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('users.index') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}"
            >
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10">U</span>
                <span>User List</span>
            </a>

            <a
                href="{{ route('roles-and-permissions.index') }}"
                class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ request()->routeIs('roles-and-permissions.*') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}"
            >
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10">R</span>
                <span>Roles & Permissions</span>
            </a>
            
        </nav>

        <div class="border-t border-slate-800 px-6 py-5 flex-shrink-0">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Talk Tip</p>
            <p class="mt-3 text-sm leading-6 text-slate-400">
                Demo list, create, view, edit, then delete to show the complete CRUD loop.
            </p>
        </div>

        <!-- User Profile & Logout -->
        <div class="border-t border-slate-800 px-6 py-5 flex-shrink-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500 text-slate-950 font-semibold">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button
                    type="submit"
                    class="w-full flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-slate-300 hover:bg-slate-900 hover:text-red-400 transition"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
