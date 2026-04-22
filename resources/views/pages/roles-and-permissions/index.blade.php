<x-applayout>
    <section class="space-y-6">
        <!-- Page Header -->
        <x-layout.page-header
            title="Roles & Permissions"
            subtitle="Manage system roles and assign permissions to control user access levels."
            badge="RBAC System"
        >
            <a
                href="{{ route('roles-and-permissions.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100"
            >
                Create New Role
            </a>
        </x-layout.page-header>

        <!-- Success Alert -->
        @if (session('success'))
            <x-layout.alert type="success" message="{{ session('success') }}" />
        @endif

        <!-- Data Table -->
        <x-layout.data-table id="roles-table" route="{{ route('roles-and-permissions.index') }}">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </x-layout.data-table>
    </section>

    @push('scripts')
        <script type="module">
            $(function () {
                $('#roles-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('roles-and-permissions.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'guard_name', name: 'guard_name' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ],
                    order: [[3, 'desc']]
                });

                $(document).on('submit', '.delete-role-form', function (event) {
                    if (!window.confirm('Delete this role?')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
</x-applayout>
               