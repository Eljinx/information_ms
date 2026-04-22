<div class="flex items-center gap-2">
    <a
        href="{{ route('users.show', $user) }}"
        class="rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50"
    >
        View
    </a>
    <a
        href="{{ route('users.edit', $user) }}"
        class="rounded-md bg-amber-500 px-3 py-2 text-xs font-semibold text-white transition hover:bg-amber-600"
    >
        Edit
    </a>
    <form action="{{ route('users.destroy', $user) }}" method="POST" class="delete-user-form inline">
        @csrf
        @method('DELETE')
        <button
            type="submit"
            class="rounded-md bg-rose-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-rose-700"
        >
            Delete
        </button>
    </form>
</div>
