<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $quote = Inspiring::quote();
    return view('dashboard', compact('quote'));
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
require __DIR__.'/web/admin.php';
