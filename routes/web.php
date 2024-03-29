<?php

use App\Http\Controllers\Auth\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\Auth\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource('tasks', TaskController::class)
        ->middleware(['auth', 'verified']);
Route::resource('orders', OrderController::class)
        ->middleware(['auth', 'verified']);



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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index', [ManageUserController::class, 'index'])->name('index');
    Route::get('/show/{user}', [ManageUserController::class, 'show'])->name('show');
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


