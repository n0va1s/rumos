<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lever\PrintLeverController;
use App\Http\Controllers\Admin\{
    GroupController,
    PersonController,
    RecordController
};
use App\Http\Controllers\Rumo\{
    RumoController,
    PhotoController,
    OrientationController,
    SupportController
};

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('groups', GroupController::class)
    ->middleware(['auth', 'verified']);

Route::resource('people', PersonController::class)
    ->middleware(['auth', 'verified']);

Route::resource('rumos', RumoController::class)
    ->middleware(['auth', 'verified']);

Route::resource('records', RecordController::class)
    ->only('index', 'edit', 'update', 'destroy')
    ->middleware(['auth', 'verified']);

Route::get(
    '/records/create',
    [RecordController::class, 'create']
)->name('records.create');
Route::post(
    '/records',
    [RecordController::class, 'store']
)->name('records.store');

Route::post(
    '/rumos/search',
    [RumoController::class, 'search']
)->name('rumos.search');
Route::get(
    '/rumos/{id}/show',
    [RumoController::class, 'show']
)->name('rumos.show');
Route::get(
    '/rumos/{id}/back',
    [RumoController::class, 'back']
)->name('rumos.back');

Route::get(
    '/rumos/{id}/orientation',
    [OrientationController::class, 'create']
)->name('rumos.orientation.create');
Route::post(
    '/rumos/orientation',
    [OrientationController::class, 'store']
)->name('rumos.orientation.store');

Route::get(
    '/rumos/{id}/support',
    [SupportController::class, 'create']
)->name('rumos.support.create');
Route::post(
    '/rumos/support',
    [SupportController::class, 'store']
)->name('rumos.support.store');

Route::get(
    '/rumos/{id}/photo',
    [PhotoController::class, 'create']
)->name('rumos.photo.create');
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
