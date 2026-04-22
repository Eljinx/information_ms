<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            return DataTables::eloquent(User::query()->select(['id', 'name', 'email', 'created_at']))
                ->addIndexColumn()
                ->editColumn('created_at', fn (User $user) => optional($user->created_at)->format('M d, Y h:i A'))
                ->addColumn('actions', fn (User $user) => view('pages.users.partials.actions', compact('user'))->render())
                ->rawColumns(['actions'])
                ->toJson();
        }

        return view('pages.users.index');
    }

    public function create(): View
    {
        return view('pages.users.create', [
            'user' => new User(),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user): View
    {
        return view('pages.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        if (blank($validated['password'] ?? null)) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
