<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Automobile\VehiculeController;
use App\Http\Controllers\Event\OrganizerController;
use App\Http\Controllers\Service\ExtraServiceController;
use App\Http\Controllers\Immovable\PropertyController;
use Illuminate\Support\Facades\Route;

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

// Route::group(function () {
// Route::middleware([
//     ,
//     'localeSessionRedirect',
//     'localizationRedirect',
//     'localeViewPath'
// ])->group([
//     'prefix' => LaravelLocalization::setLocale()
// ], function () {

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'get.event.organizers']
], function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function () {
        return view('home.about');
    })->name('about');

    Route::prefix('auth')
        ->name('auth.')
        ->group(function () {
            Route::get('/login', [LoginController::class, 'authenticate'])
                ->name('login')
                ->middleware('guest');


            Route::post('/logout', [LoginController::class, 'logout'])
                ->name('logout')
                ->middleware('auth');
        });

    Route::prefix('automobile')
        ->name('automobile.')
        ->group(function () {
            Route::resource('vehicule', VehiculeController::class)
                ->shallow()
                ->except([
                    'store',
                    'update',
                    'delete',
                ]);
        });

    Route::prefix('service')
        ->name('service.')
        ->group(function () {
            Route::resource('extraService', ExtraServiceController::class)
                ->shallow()
                ->except([
                    'store',
                    'update',
                    'delete',
                ]);
        });

    Route::prefix('immovable')
        ->name('immovable.')
        ->group(function () {
            Route::resource('property', PropertyController::class)
                ->shallow()
                ->except([
                    'store',
                    'update',
                    'delete',
                ]);
        });

    Route::prefix('event')
        ->name('event.')
        ->group(function () {
            Route::resource('organizer', OrganizerController::class)
                ->shallow()
                ->except([
                    'index',
                    'store',
                    'update',
                    'delete',
                ]);
        });
});
