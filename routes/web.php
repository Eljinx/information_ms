<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesAndPermissionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class)->middleware(['auth', 'auth.session']);
Route::resource('roles-and-permissions', RolesAndPermissionsController::class)->middleware(['auth', 'auth.session']);