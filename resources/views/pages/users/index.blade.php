<x-applayout>
    <section class="space-y-6">
        <!-- Page Header -->
        <x-layout.page-header
            title="User Management"
            subtitle="Manage user records with server-side Yajra DataTables, full CRUD actions, and a layout that matches your current Blade structure."
            badge="CRUD Demonstration"
        >
            <a
                href="{{ route('users.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100"
            >
                Create New User
            </a>
        </x-layout.page-header>

        <!-- Success Alert -->
        @if (session('success'))
            <x-layout.alert type="success" message="{{ session('success') }}" />
        @endif

        <!-- Data Table -->
        <x-layout.data-table id="users-table" route="{{ route('users.index') }}">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </x-layout.data-table>
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
