<x-applayout>
    <section class="mx-auto max-w-4xl space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-sky-600">Profile</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $user->name }}</h1>
                <p class="mt-2 text-sm text-slate-500">Detailed user information for your CRUD demo.</p>
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
    </section>
</x-applayout>
