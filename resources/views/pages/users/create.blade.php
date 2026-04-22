<x-applayout>
    <section class="mx-auto max-w-4xl">
        <div class="mb-6">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-emerald-600">Create</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">Add User</h1>
            <p class="mt-2 text-sm text-slate-500">Create a new user record for your demonstration.</p>
        </div>

        <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @include('pages.users.partials.form')
            </form>
        </div>
    </section>
</x-applayout>
