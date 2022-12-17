<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Lever\PrintLeverController;
use App\Http\Controllers\Rumo\RumoController;
use App\Http\Controllers\Rumo\PhotoController;

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

Route::get(
    '/rumos',
    [RumoController::class, 'index']
)->name('rumos.index');
Route::get(
    '/rumos/create',
    [RumoController::class, 'create']
)->name('rumos.create');
Route::post(
    '/rumos',
    [RumoController::class, 'store']
)->name('rumos.store');
Route::post(
    '/rumos/search',
    [RumoController::class, 'search']
)->name('rumos.search');
Route::get(
    '/rumos/orientation',
    [RumoController::class, 'orientation']
)->name('rumos.orientation');
Route::get(
    '/rumos/kitchen',
    [RumoController::class, 'kitchen']
)->name('rumos.kitchen');
Route::get(
    '/rumos/support',
    [RumoController::class, 'support']
)->name('rumos.support');
Route::get(
    '/rumos/{id}/photo',
    [PhotoController::class, 'index']
)->name('rumos.photo.index');
Route::post(
    '/rumos/photo',
    [PhotoController::class, 'store']
)->name('rumos.photo.store');


Route::get(
    '/levers',
    [PrintLeverController::class, 'index']
)->name('levers.index');

Route::post(
    '/levers',
    [PrintLeverController::class, 'search']
)->name('levers.search');

require __DIR__ . '/auth.php';
