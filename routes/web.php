<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    GroupController,
    LeverController,
    PersonController,
    RecordController,
    OptionController,
    RumoController
};
use App\Http\Controllers\Auth\DashboardController;

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

Route::middleware(['web'])->group(
    function () {
        Route::get(
            '/',
            function () {
                return view('welcome');
            }
        )->name('welcome');

        Route::get(
            '/records/create',
            [RecordController::class, 'create']
        )->name('records.create');
        Route::get(
            '/records/presenter',
            [RecordController::class, 'presenter']
        )->name('records.presenter');
        Route::get(
            '/records/religion',
            [RecordController::class, 'religion']
        )->name('records.religion');
        Route::post(
            '/records/store',
            [RecordController::class, 'store']
        )->name('records.store');
        Route::post(
            '/records/candidate',
            [RecordController::class, 'storeCandidate']
        )->name('records.candidate.store');
        Route::post(
            '/records/presenter',
            [RecordController::class, 'storePresenter']
        )->name('records.presenter.store');
        Route::get(
            '/records/done',
            [RecordController::class, 'done']
        )->name('records.done');

        Route::get(
            '/levers/create',
            [LeverController::class, 'create']
        )->name('levers.create');
        Route::get(
            '/levers/{id}/message',
            [LeverController::class, 'message']
        )->name('levers.message');
        Route::post(
            '/levers/store',
            [LeverController::class, 'store']
        )->name('levers.store');
        Route::get(
            '/levers/done',
            [LeverController::class, 'done']
        )->name('levers.done');
    }
);

Route::middleware(['auth'])->group(
    function () {
        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');
        
        Route::get(
            '/groups',
            [GroupController::class, 'index']
        )->name('groups.index');
        
        Route::get(
            '/levers',
            [LeverController::class, 'index']
        )->name('levers.index');
        
        Route::get(
            '/records',
            [RecordController::class, 'index']
        )->name('records.index');

        Route::resource('people', PersonController::class);
        
        Route::resource('options', OptionController::class);

        Route::get('rumos', [RumoController::class, 'index'])->name('rumos.index');
        Route::get('rumos/{id}', [RumoController::class, 'course'])->name('rumos.course');
    }
);

Route::get('/mail/birthday', function () {
    $person = [
        'first_name' => 'Fulana'
    ];
    \Illuminate\Support\Facades\Mail::to(
        "jp.trabalho@gmail.com"
    )->send(
        new \App\Mail\BirthdayMail($person)
    );
    dd("Email enviado");
});

require __DIR__ . '/auth.php';
