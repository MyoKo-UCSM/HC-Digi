<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\CommitteeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\VenueController;
use App\Http\Controllers\Frontend\XMLSiteMapController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['XssSanitizer']], function () {

    /*
    |--------------------------------------------------------------------------
    | This is the route for LoginController
    |--------------------------------------------------------------------------
     */
    Route::controller(LoginController::class)->group(function () {
        Route::get('member-login', 'loginForm')->name('front.get.login');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for RegisterController
    |--------------------------------------------------------------------------
     */
    Route::controller(RegisterController::class)->group(function () {
        Route::get('member-register', 'registerForm')->name('front.get.register');
        Route::post('member-register', 'register')->name('front.post.register');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for HomeController
    |--------------------------------------------------------------------------
     */
    Route::redirect('/', '/letadminin');
    Route::get('/', [HomeController::class, 'index'])->name('front.home');

    /*
    |--------------------------------------------------------------------------
    | This is the route for NewsController
    |--------------------------------------------------------------------------
     */
    Route::get('news', [NewsController::class, 'index'])->name('front.news');
    Route::get('news/{slug}/detail', [NewsController::class, 'newsDetail'])->name('front.news.detail');

    /*
    |--------------------------------------------------------------------------
    | This is the route for CommitteeController
    |--------------------------------------------------------------------------
     */
    Route::get('committee', [CommitteeController::class, 'index'])->name('front.committee');

    /*
    |--------------------------------------------------------------------------
    | This is the route for VenueController
    |--------------------------------------------------------------------------
     */
    Route::get('venue', [VenueController::class, 'index'])->name('front.venue');

    /*
    |--------------------------------------------------------------------------
    | This is the route for XMLSiteMapController
    |--------------------------------------------------------------------------
     */
    Route::get('sitemap.xml', [XMLSiteMapController::class, 'siteMap']);

});
