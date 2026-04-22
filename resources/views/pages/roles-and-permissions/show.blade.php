<x-applayout>
    <section class="mx-auto max-w-4xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">View</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $role->name }}</h1>
                <p class="mt-2 text-sm text-slate-500">{{ $role->description ?? 'No description provided.' }}</p>
            </div>

            <div class="flex gap-2">
                <a
                    href="{{ route('roles-and-permissions.edit', $role) }}"
                    class="inline-flex items-center justify-center rounded-xl bg-amber-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-amber-700"
                >
                    Edit Role
                </a>
                <a
                    href="{{ route('roles-and-permissions.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-50"
                >
                    Back
                </a>
            </div>
        </div>

        <!-- Permissions Grid -->
        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <h2 class="mb-6 text-xl font-bold text-slate-900">Assigned Permissions</h2>

            @if ($role->permissions->isEmpty())
                <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center">
                    <svg class="mx-auto mb-4 h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-slate-600">This role has no permissions assigned.</p>
                </div>
            @else
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($role->permissions as $permission)
                        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-slate-900">{{ $permission->name }}</p>
                                    @if ($permission->description)
                                        <p class="text-xs text-slate-600">{{ $permission->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Role Statistics -->
        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 p-6 ring-1 ring-blue-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Total Permissions</p>
                        <p class="text-3xl font-bold text-blue-900">{{ $role->permissions->count() }}</p>
                    </div>
                    <svg class="h-12 w-12 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 p-6 ring-1 ring-slate-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Created On</p>
                        <p class="text-3xl font-bold text-slate-900">{{ $role->created_at->format('M d, Y') }}</p>
                    </div>
                    <svg class="h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-applayout>
