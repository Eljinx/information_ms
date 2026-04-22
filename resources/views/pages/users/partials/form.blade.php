@php($isEdit = $user->exists)

<div class="grid gap-6 md:grid-cols-2">
    <div>
        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Full Name</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="Enter full name"
            required
        >
        @error('name')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="Enter email address"
            required
        >
        @error('email')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
            {{ $isEdit ? 'New Password' : 'Password' }}
        </label>
        <input
            type="password"
            id="password"
            name="password"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="{{ $isEdit ? 'Leave blank to keep current password' : 'Enter password' }}"
            @if (! $isEdit) required @endif
        >
        @error('password')
            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">Confirm Password</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
            placeholder="Confirm password"
            @if (! $isEdit) required @endif
        >
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button
        type="submit"
        class="rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700"
    >
        {{ $isEdit ? 'Update User' : 'Save User' }}
    </button>
    <a
        href="{{ route('users.index') }}"
        class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
    >
        Cancel
    </a>
</div>
