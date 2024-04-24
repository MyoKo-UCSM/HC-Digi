<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::group(['middleware' => ['XssSanitizer']], function () {
    Route::redirect('login', '/letadminin');
    Route::get('letadminin', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('letadminin', [LoginController::class, 'login'])->name('post.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
