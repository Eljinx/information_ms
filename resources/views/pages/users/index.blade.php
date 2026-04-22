<x-applayout>

    <section class="space-y-6">
        <div class="flex flex-col gap-4 rounded-3xl bg-gradient-to-r from-slate-900 to-emerald-700 p-8 text-white shadow-xl md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-emerald-200">CRUD Demonstration</p>
                <h1 class="mt-2 text-3xl font-bold">User Management</h1>
                <p class="mt-3 max-w-2xl text-sm text-slate-200">
                    Manage user records with server-side Yajra DataTables, full CRUD actions, and a layout that matches your current Blade structure.
                </p>
            </div>

            <a
                href="{{ route('users.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100"
            >
                Create New User
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <table id="users-table" class="display stripe w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>

    @push('scripts')
        <script type="module">

            $(function () {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('users.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ],
                    order: [[3, 'desc']]
                });

                $(document).on('submit', '.delete-user-form', function (event) {
                    if (!window.confirm('Delete this user?')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush

</x-applayout>
