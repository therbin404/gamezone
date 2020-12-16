<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('User', 'UsersController');
Route::resource('Address', 'AddressController');
Route::resource('Attraction', 'AttractionController');
Route::resource('Schedule', 'ScheduleController')->only([
  'index', 'store', 'create', 'edit', 'update', 'destroy'
]);
Route::get('/contact', 'SendEmailController@index')->name('contact');
Route::post('/contact/send', 'SendEmailController@send')->name('mail.send');

Route::get('/mention', 'HomeController@mention')->name('mention');

Route::get('/map', 'HomeController@map')->name('map');
Route::get('/pricelist', 'HomeController@pricelist')->name('pricelist');
