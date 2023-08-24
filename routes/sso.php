<?php

use App\Http\Controllers\OAuth\OAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/oauth/callback', [OAuthController::class, 'callback'])->name('sso.callback');
Route::get('/oauth/user', [OAuthController::class, 'user'])->name('sso.user');
Route::get('/oauth/logout', [OAuthController::class, 'logout'])->name('sso.logout');
