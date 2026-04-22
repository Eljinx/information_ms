<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\URL;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Validation;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

/**
 * Requests
 */
use App\Http\Requests\RoleRequest;

/**
 * DataTable
 */
use DataTables;

class RolesAndPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {

            $roles = Role::query()->select(['id', 'name', 'guard_name', 'created_at']);

            return DataTables::eloquent($roles)
                ->addIndexColumn()
                ->editColumn('created_at', fn (Role $role) => optional($role->created_at)->format('M d, Y h:i A'))
                ->addColumn('actions', fn (Role $role) => view('pages.roles-and-permissions.partials.actions', compact('role'))->render())
                ->rawColumns(['actions'])
                ->toJson();
        }

        return view('pages.roles-and-permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.roles-and-permissions.create', [
            'role' => new Role(),
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $role = Role::create($request->validated());

        if ($request->has('permissions') && is_array($request->permissions)) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()
            ->route('roles-and-permissions.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $rolesAndPermission): View
    {
        $rolesAndPermission->load('permissions');

        return view('pages.roles-and-permissions.show', [
            'role' => $rolesAndPermission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $rolesAndPermission): View
    {
        return view('pages.roles-and-permissions.edit', [
            'role' => $rolesAndPermission,
            'permissions' => Permission::all(),
            'rolePermissions' => $rolesAndPermission->permissions->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $rolesAndPermission): RedirectResponse
    {
        $rolesAndPermission->update($request->validated());

        if ($request->has('permissions') && is_array($request->permissions)) {
            $rolesAndPermission->permissions()->sync($request->permissions);
        } else {
            $rolesAndPermission->permissions()->sync([]);
        }

        return redirect()
            ->route('roles-and-permissions.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $rolesAndPermission): RedirectResponse
    {
        $rolesAndPermission->delete();

        return redirect()
            ->route('roles-and-permissions.index')
            ->with('success', 'Role deleted successfully.');
    }
}
