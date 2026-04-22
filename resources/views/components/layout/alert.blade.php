@php
$alertStyles = match($type) {
    'success' => 'rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700',
    'error' => 'rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700',
    'warning' => 'rounded-2xl border border-yellow-200 bg-yellow-50 px-5 py-4 text-sm font-medium text-yellow-700',
    'info' => 'rounded-2xl border border-blue-200 bg-blue-50 px-5 py-4 text-sm font-medium text-blue-700',
    default => 'rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700',
};
@endphp

<div class="{{ $alertStyles }}">
    {{ $message }}
</div>
