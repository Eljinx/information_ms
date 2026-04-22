@php($isEdit = $role->exists)

<div class="grid gap-6 md:grid-cols-2">
    <div class="md:col-span-2">
        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Role Name</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $role->name) }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="Enter role name (e.g., Admin, Editor, Viewer)"
            required
        >
        @error('name')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="guard_name" class="mb-2 block text-sm font-semibold text-slate-700">Guard Name</label>
        <input
            type="text"
            id="guard_name"
            name="guard_name"
            value="{{ old('guard_name', $role->guard_name) }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="Describe the purpose of this role"
        >
        @error('guard_name')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="mb-4 block text-sm font-semibold text-slate-700">Permissions</label>
        <div class="space-y-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
            @if ($permissions->isEmpty())
                <p class="text-sm text-slate-500">No permissions available.</p>
            @else
                @foreach ($permissions->chunk(3) as $chunk)
                    <div class="grid gap-4 md:grid-cols-3">
                        @foreach ($chunk as $permission)
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->id }}"
                                    @checked(in_array($permission->id, $rolePermissions ?? []))
                                    class="h-4 w-4 rounded border-slate-300 text-emerald-600 shadow-sm focus:ring-emerald-500"
                                >
                                <div>
                                    <p class="text-sm font-medium text-slate-900">{{ $permission->name }}</p>
                                    @if ($permission->description)
                                        <p class="text-xs text-slate-500">{{ $permission->description }}</p>
                                    @endif
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
        @error('permissions')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Form Actions -->
<div class="mt-8 flex gap-3">
    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700"
    >
        {{ $isEdit ? 'Update Role' : 'Create Role' }}
    </button>
    <a
        href="{{ route('roles-and-permissions.index') }}"
        class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-50"
    >
        Cancel
    </a>
</div>
