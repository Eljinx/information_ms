# Roles & Permissions Module - Setup Documentation

## Overview
This application uses Laravel Spatie Permission package for role-based access control (RBAC). The module includes a complete CRUD interface for managing roles and assigning permissions.

## What's Included

### 1. **Models & Relationships**
- User model with `HasRoles` trait (already configured)
- Spatie Permission Models: `Role`, `Permission`
- Automatic migration tables for roles and permissions

### 2. **Controller**
- `RolesAndPermissionsController` - Full CRUD operations with DataTables support
  - `index()` - List all roles with server-side datatable
  - `create()` - Show form to create new role
  - `store()` - Save new role with permissions
  - `show()` - View role details and assigned permissions
  - `edit()` - Show form to edit role
  - `update()` - Update role and permissions
  - `destroy()` - Delete role

### 3. **Requests**
- `RoleRequest` - Form validation for roles
  - Validates role name uniqueness
  - Validates permissions array
  - Custom error messages

### 4. **Views (Component-based)**
- `pages/roles-and-permissions/index.blade.php` - List all roles
- `pages/roles-and-permissions/create.blade.php` - Create role form
- `pages/roles-and-permissions/edit.blade.php` - Edit role form
- `pages/roles-and-permissions/show.blade.php` - View role details
- `pages/roles-and-permissions/partials/form.blade.php` - Reusable form component
- `pages/roles-and-permissions/partials/actions.blade.php` - Action buttons

### 5. **Seeders**
- `RolesAndPermissionsSeeder` - Seeds default roles and permissions

## Default Roles & Permissions

### Roles
1. **Admin** - Full access to all features
2. **Editor** - Can create and edit content
3. **Viewer** - Read-only access

### Permissions
- `view users` - View all users
- `create users` - Create new users
- `edit users` - Edit existing users
- `delete users` - Delete users
- `view roles` - View roles and permissions
- `create roles` - Create new roles
- `edit roles` - Edit existing roles
- `delete roles` - Delete roles
- `assign permissions` - Assign permissions to roles

## Routes
```
GET|HEAD        /roles-and-permissions               # List roles (index)
POST            /roles-and-permissions               # Store new role
GET|HEAD        /roles-and-permissions/create        # Show create form
GET|HEAD        /roles-and-permissions/{id}          # Show role details
PUT             /roles-and-permissions/{id}          # Update role
DELETE          /roles-and-permissions/{id}          # Delete role
GET|HEAD        /roles-and-permissions/{id}/edit     # Show edit form
```

## Setup Instructions

### 1. Install Dependencies
```bash
composer install
```

### 2. Run Migrations
```bash
php artisan migrate
```

### 3. Seed Database
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
# Or run all seeders:
php artisan db:seed
```

### 4. Assign Role to User (Optional)
```php
// In tinker or migration
$user = User::first();
$user->assignRole('Admin');
```

## Usage Examples

### Assigning Roles
```php
$user->assignRole('Editor');
$user->assignRoles(['Editor', 'Viewer']);
$user->syncRoles('Editor');
```

### Checking Permissions
```php
if ($user->can('edit users')) {
    // User has permission
}

if ($user->hasRole('Admin')) {
    // User is admin
}
```

### In Blade Templates
```blade
@can('edit users')
    <a href="{{ route('users.edit', $user) }}">Edit</a>
@endcan

@role('Admin')
    <div>Admin content</div>
@endrole
```

### Creating Permissions Dynamically
```php
Permission::create(['name' => 'new permission', 'description' => 'Description']);
```

### Creating Roles Dynamically
```php
$role = Role::create(['name' => 'Moderator', 'description' => 'Content moderator']);
$role->givePermissionTo(['view users', 'edit users']);
```

## Database Tables

### Roles Table
- `id`
- `name` - Role name (e.g., 'Admin')
- `guard_name` - Guard type (default: 'web')
- `description` - Role description
- `created_at`
- `updated_at`

### Permissions Table
- `id`
- `name` - Permission name
- `guard_name` - Guard type (default: 'web')
- `description` - Permission description
- `created_at`
- `updated_at`

### Pivot Tables
- `role_has_permissions` - Link roles to permissions
- `model_has_roles` - Link users to roles
- `model_has_permissions` - Link users to permissions directly

## Key Features

✅ **Server-side DataTables** - Efficient data loading with search and sorting
✅ **Bulk Permission Assignment** - Assign multiple permissions to a role at once
✅ **Permission Descriptions** - Know what each permission does
✅ **Role Details View** - See all permissions assigned to a role
✅ **Responsive Design** - Works on mobile and desktop
✅ **Form Validation** - Comprehensive validation with custom messages
✅ **Component-based Views** - Reusable UI components throughout

## File Structure
```
app/
├── Http/
│   ├── Controllers/
│   │   └── RolesAndPermissionsController.php
│   └── Requests/
│       └── RoleRequest.php
│
database/
├── migrations/
│   └── 2026_04_23_040059_create_permission_tables.php
└── seeders/
    ├── RolesAndPermissionsSeeder.php
    └── DatabaseSeeder.php

resources/
└── views/
    └── pages/
        └── roles-and-permissions/
            ├── index.blade.php
            ├── create.blade.php
            ├── edit.blade.php
            ├── show.blade.php
            └── partials/
                ├── form.blade.php
                └── actions.blade.php
```

## Testing Checklist

- [ ] Create a new role
- [ ] Assign permissions to the role
- [ ] View role details
- [ ] Edit role and modify permissions
- [ ] Delete a role
- [ ] Verify DataTable search and filtering
- [ ] Check responsive design on mobile
- [ ] Test permission validation

## Future Enhancements

- [ ] User role assignment interface
- [ ] Permission assignment for individual users
- [ ] Role templates/presets
- [ ] Audit log for role changes
- [ ] Permission grouping by category
- [ ] Export roles and permissions
