<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::group(['prefix' => 'usuarios'], function() {
        Route::get('', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('lista', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('nuevo', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('nuevo', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('{user_id}/editar', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('{user_id}/actualizar', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('{user_id}/eliminar', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('{user_id}/asignar-fanpage', [UserController::class, 'getFanpage'])->name('admin.user.fanpage');
        Route::post('{user_id}/asignar-fanpage', [UserController::class, 'postFanpage'])->name('admin.user.fanpage');
    });
});
