<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    GroupController,
    LeverController,
    PersonController,
    RecordController,
    OptionController
};
use App\Http\Controllers\Rumo\{
    RumoController,
    PhotoController,
    OrientationController,
    SupportController,
    MemberController
};
use App\Http\Livewire\{
    GroupForm
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

Route::middleware(['web'])->group(
    function () {
        Route::get(
            '/', function () {
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
            '/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get(
            '/groups',
            [GroupController::class, 'index']
        )->name('groups.index');
        Route::get(
            '/levers',
            [LeverController::class, 'index']
        )->name('levers.index');
        Route::resource('people', PersonController::class);
        Route::resource('rumos', RumoController::class);
        Route::resource('records', RecordController::class)
        ->only('index', 'edit', 'update', 'destroy');
        Route::resource('options', OptionController::class);

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
            '/rumos/{id}/member',
            [MemberController::class, 'create']
        )->name('rumos.member.create');
        Route::post(
            '/rumos/member',
            [MemberController::class, 'store']
        )->name('rumos.member.store');
        
        Route::get(
            '/rumos/{id}/photo',
            [PhotoController::class, 'create']
        )->name('rumos.photo.create');
        Route::post(
            '/rumos/photo',
            [PhotoController::class, 'store']
        )->name('rumos.photo.store');
/*
        Route::get(
            '/levers',
            [PrintLeverController::class, 'index']
        )->name('levers.index');
        
        Route::post(
            '/levers',
            [PrintLeverController::class, 'search']
        )->name('levers.search');
*/        
});

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
