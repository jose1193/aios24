<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\GoogleSocialiteController;

use App\Http\Livewire\Plans;
use App\Http\Livewire\About;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirectUser'])->name('dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('terms', [HomeController::class, 'terms'])->name('terms');
Route::get('privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('cookie', [HomeController::class, 'cookie'])->name('cookie');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('solutions', [HomeController::class, 'solutions'])->name('solutions');

Route::get('exposition', [HomeController::class, 'exposition'])->name('exposition');
Route::get('prices', [HomeController::class, 'prices'])->name('prices');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:user'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])
->group(function () {

    // admin routes

    Route::get('/admin/dashboard',[AdminDashboardController::class,'dashboard'])
            ->name('admin.dashboard');
 Route::get('plans', Plans::class)->name('plans');
});



  // GOOGLE AUTH
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);
