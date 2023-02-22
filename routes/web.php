<?php

use Illuminate\Support\Facades\Route;
use Mimisk13\UserManagement\Http\Controllers\RoleController;
use Mimisk13\UserManagement\Http\Controllers\UserController;
use Mimisk13\UserManagement\Http\Controllers\PermissionController;

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
