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

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::resources([
    'users' => 'UserController',
    'places' => 'PlaceController',
    'ostans' => 'OstanController',
    'cities' => 'CityController',
    'comments' => 'CommentController',
    'likes' => 'LikeController',
    'notifications' => 'NotificationController'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
