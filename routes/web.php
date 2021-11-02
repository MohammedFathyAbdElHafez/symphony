<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\createArtist;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\ArtistController;
use App\Http\Controllers\API\VenueController;
use App\Http\Controllers\API\ShowController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('artists', ArtistController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('shows', ShowController::class);



    Route::get('findVenues', [ArtistController::class, 'get_venues']);

    Route::get('findArtists', [VenueController::class, 'get_artists']);


});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});