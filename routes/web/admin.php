<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::group(['prefix' => 'usuarios'], function() {
        Route::get('', [UserController::class, 'index'])
            ->middleware('can:viewAny,App\Models\User')
            ->name('admin.user.index');

        Route::get('lista', [UserController::class, 'list'])
            ->middleware('can:viewAny,App\Models\User')
            ->name('admin.user.list');

        Route::get('nuevo', [UserController::class, 'create'])
            ->middleware('can:create,App\Models\User')
            ->name('admin.user.create');

        Route::post('nuevo', [UserController::class, 'store'])
            ->middleware('can:create,App\Models\User')
            ->name('admin.user.store');

        Route::get('{user}/editar', [UserController::class, 'edit'])
            ->middleware('can:update,user')
            ->withTrashed()
            ->name('admin.user.edit');

        Route::put('{user}/actualizar', [UserController::class, 'update'])
            ->middleware('can:update,user')
            ->withTrashed()
            ->name('admin.user.update');

        Route::delete('{user}/eliminar', [UserController::class, 'delete'])
            ->middleware('can:delete,user')
            ->withTrashed()
            ->name('admin.user.delete');

        Route::get('{user}/permiso/editar', [UserController::class, 'editUserPermissions'])
            // ->middleware('can:update,user')
            // ->withTrashed()
            ->name('admin.user.permission.edit');


        Route::put('{user}/permiso/actualizar', [UserController::class, 'updateUserPermissions'])
            // ->middleware('can:update,user')
            // ->withTrashed()
            ->name('admin.user.permission.update');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('', [RoleController::class, 'index'])
            // ->middleware('can:viewAny,App\Models\User')
            ->name('admin.role.index');

        Route::get('lista', [RoleController::class, 'list'])
            // ->middleware('can:viewAny,App\Models\role')
            ->name('admin.role.list');

        Route::get('nuevo', [RoleController::class, 'create'])
            // ->middleware('can:create,App\Models\role')
            ->name('admin.role.create');

        Route::post('nuevo', [RoleController::class, 'store'])
            // ->middleware('can:create,App\Models\role')
            ->name('admin.role.store');

        Route::get('{role}/editar', [RoleController::class, 'edit'])
            // ->middleware('can:update,role')
            // ->withTrashed()
            ->name('admin.role.edit');

        Route::put('{role}/actualizar', [RoleController::class, 'update'])
            // ->middleware('can:update,role')
            // ->withTrashed()
            ->name('admin.role.update');

        Route::get('{role}/permiso/editar', [RoleController::class, 'editRolePermissions'])
            // ->middleware('can:update,role')
            // ->withTrashed()
            ->name('admin.role.permission.edit');


        Route::put('{role}/permiso/actualizar', [RoleController::class, 'updateRolePermissions'])
            // ->middleware('can:update,role')
            // ->withTrashed()
            ->name('admin.role.permission.update');

        Route::delete('{role}/eliminar', [RoleController::class, 'destroy'])
            // ->middleware('can:delete,role')
            // ->withTrashed()
            ->name('admin.role.delete');
    });
});
