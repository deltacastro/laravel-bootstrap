<?php

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

        Route::get('{user}/asignar-fanpage', [UserController::class, 'getFanpage'])->name('admin.user.fanpage');
        Route::post('{user}/asignar-fanpage', [UserController::class, 'postFanpage'])->name('admin.user.fanpage');
    });
});
