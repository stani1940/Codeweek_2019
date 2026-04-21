<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

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

Route::view('/', 'home');

// auth middleware moved from HotelController constructor to route definition (L12+ removes constructor middleware)
Route::get('/hotels', [HotelController::class, 'index'])->middleware('auth');

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);

Route::get('/rooms/{id}/roomprice', function () {
    // Replaced deprecated weidner/goutte with Symfony BrowserKit + HttpClient
    $browser = new HttpBrowser(HttpClient::create());
    $crawler = $browser->request('GET', 'http://hotelhemus.com/rooms/');

    $crawler->filter('.price')->each(function ($node) {
        dump($node->text());
    });

    echo "{$crawler->filter('.price')->first()->text()}";
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::view('/', 'dashboard/dashboard');
    Route::get('reservations/create/{id}', [ReservationController::class, 'create']);
    Route::resource('reservations', ReservationController::class)->except('create');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');