<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest.sso')->group(function () {
    Route::get('/', fn () => view("login"))->name("home");
    Route::get('/login', LoginController::class)->name("login");
});

Route::middleware(['auth.sso', 'branch'])->group(function () {
    Route::get('/dashboard', Livewire\Dashboard::class)->name("dashboard");
    Route::get('/products', Livewire\Products\Index::class)->name('products');
});
