<?php

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
Route::get('/hotels', 'HotelController@index');
Route::get('/rooms', 'RoomController@index');
Route::get('/rooms/{id}', 'RoomController@show');
Route::get('/rooms/{id}/roomprice', function()  {

    $crawler = Goutte::request('GET', 'http://hotelhemus.com/rooms/');

    $crawler->filter('.price')->each(function ($node) {

        dump($node->text());

    });

        echo "{$crawler->filter('.price')->first()->text()}";



});


Route::group(['prefix' => 'dashboard'], function() {
    Route::view('/', 'dashboard/dashboard');
    Route::get('reservations/create/{id}', 'ReservationController@create');

    Route::resource('reservations', 'ReservationController')->except('create');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('register');
