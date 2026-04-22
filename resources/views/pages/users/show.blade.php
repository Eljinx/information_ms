<x-applayout>
    <section class="mx-auto max-w-4xl space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-sky-600">Profile</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $user->name }}</h1>
                <p class="mt-2 text-sm text-slate-500">User account and role information.</p>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="{{ route('users.edit', $user) }}"
                    class="rounded-xl bg-amber-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-amber-600"
                >
                    Edit User
                </a>
                <a
                    href="{{ route('users.index') }}"
                    class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    Back to List
                </a>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-semibold text-slate-500">Full Name</p>
                <p class="mt-3 text-xl font-bold text-slate-900">{{ $user->name }}</p>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-semibold text-slate-500">Email Address</p>
                <p class="mt-3 text-xl font-bold text-slate-900">{{ $user->email }}</p>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-semibold text-slate-500">Created At</p>
                <p class="mt-3 text-xl font-bold text-slate-900">{{ optional($user->created_at)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-semibold text-slate-500">Last Updated</p>
                <p class="mt-3 text-xl font-bold text-slate-900">{{ optional($user->updated_at)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <!-- User Roles -->
        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <h2 class="mb-6 text-xl font-bold text-slate-900">Assigned Roles</h2>

            @if ($user->roles->isEmpty())
                <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center">
                    <svg class="mx-auto mb-4 h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <p class="text-slate-600">This user has no roles assigned.</p>
                </div>
            @else
                <div class="flex flex-wrap gap-3">
                    @foreach ($user->roles as $role)
                        <div class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            <span class="text-sm font-semibold text-emerald-900">{{ $role->name }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-applayout>
