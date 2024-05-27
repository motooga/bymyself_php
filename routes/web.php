<?php

use App\Http\Controllers\Auth\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PointEventController;
use App\Http\Controllers\User\Auth\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index', [ManageUserController::class, 'index'])->name('index');
    Route::get('/show/{user}', [ManageUserController::class, 'show'])->name('show');
    Route::get('/family/report/{report}', [ManageUserController::class, 'FamilyReportShow'])->name('FamilyReportShow');
    Route::post('/family/report/{report}', [PointEventController::class, 'store'])->name('point_event.store');
    Route::patch('/family/report/{report}', [ManageUserController::class ,'update'])->name('report.allow');
    Route::post('/family/report/{report}/point', [PointController::class, 'store'])->name('point.store');
    Route::post('/points/increase', [PointController::class, 'increasePoints'])->name('points.increase');
    Route::post('/points/decrease', [PointController::class, 'decreasePoints'])->name('points.decrease');
    Route::get('/points/{userId}', [PointController::class, 'getPoints'])->name('points.get');
});


Route::resource('tasks', TaskController::class)
        ->middleware(['auth', 'verified']);
Route::resource('orders', OrderController::class)
        ->middleware(['auth', 'verified']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


require __DIR__.'/auth.php';

Route::prefix('user')->name('user.')->group(function(){

    Route::get('/dashboard',  [UserController::class, 'show'] )
    ->middleware(['auth:user', 'verified'])->name('dashboard');

    Route::middleware('auth:user')->group(function () {
      Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/user.php';
});

Route::post('/order/{order}/reports', [ReportController::class, 'store'])
        ->middleware(['auth:user'])
        ->name('order.reports.store');
Route::get('/order/{order}/reports/create', [ReportController::class ,'create'])
        ->middleware(['auth:user'])
        ->name('order.reports.create');
Route::get('/reports/index', [ReportController::class ,'index'])
        ->middleware(['auth:user'])
        ->name('reports.index');
Route::get('/reports/show/{report}', [ReportController::class ,'show'])
        ->middleware(['auth:user'])
        ->name('reports.show');
Route::delete('/reports/show/{report}', [ReportController::class ,'destroy'])
        ->middleware(['auth:user'])
        ->name('reports.destroy');
Route::get('/report/edit/{report}', [ReportController::class ,'edit'])
        ->middleware(['auth:user'])
        ->name('reports.edit');
Route::patch('/report/edit/{report}', [ReportController::class ,'update'])
        ->middleware(['auth:user'])
        ->name('reports.update');
Route::get('/point/index', [PointController::class, 'index'])
        ->middleware(['auth:user'])
        ->name('point.index');
