<?php

use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GroupController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('groups', GroupController::class)
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
