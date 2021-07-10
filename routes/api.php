<?php

use Illuminate\Http\Request;
use App\Library\Services\Sms;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// SendSms
Route::post('sms', function(Request $request){
    $sms = new Sms;
    return $sms->sendSms($request);
})->middleware('client');



Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user()->load('ostan', 'city', 'role');
});

Route::middleware('auth:api')->put('/user', function (Request $request) {

    if($request->user()->update($request->all())){
        return $request->user()->load('ostan', 'city', 'role');
    }
});


    //Complex
    Route::get('complexes/search', 'API\ComplexController@search');
    Route::get('complexes/search/range', 'API\ComplexController@range');
    Route::get('complexes/{complex}/places', 'API\ComplexController@places');
    Route::get('complexes/{complex}/comments', 'API\ComplexController@comments');
    Route::get('complexes/{complex}/likes', 'API\ComplexController@likes');
    Route::get('complexes/{complex}/notifications', 'API\ComplexController@notifications');

    // PLACE
    Route::get('places/salons', 'API\PlaceController@salons');
    Route::get('places/gyms', 'API\PlaceController@bashgahs');
    Route::get('places/entertainments', 'API\PlaceController@funcomplexes');
    Route::get('places/{place}/fields', 'API\PlaceController@fields');
    Route::get('places/{place}/facilities', 'API\PlaceController@facilities');
    Route::post('places/{place}/timings', 'API\PlaceController@timings');
     
    //Ostan
    Route::get('ostans/{ostan}/cities', 'API\OstanController@cities');

    //City
    Route::get('cities/{city}/regions', 'API\CityController@regions');


Route::group(['middleware' => ['auth:api']], function () {

    // USER
    Route::get('user/complexes', 'API\UserController@complexes');
    Route::get('user/places', 'API\UserController@places');
    Route::get('user/likes', 'API\UserController@likes');
    Route::get('user/comments', 'API\UserController@comments');
    Route::get('user/transactions', 'API\UserController@transactions');
    Route::get('user/notifications', 'API\UserController@notifications');
    Route::get('user/likes', 'API\UserController@likes');
    Route::post('user/likes', 'API\UserController@likesPost');

});



Route::group(['middleware' => ['auth:api']], function(){


    Route::apiResources([
        //'users' => 'API\UserController',
        'complexes' => 'API\ComplexController',
        'places' => 'API\PlaceController',
        'ostans' => 'API\OstanController',
        'cities' => 'API\CityController',
        'regions' => 'API\RegionController',
        'comments' => 'API\CommentController',
        'likes' => 'API\LikeController',
        'notifications' => 'API\NotificationController',
        'fields' => 'API\FieldController',
        'facilities' => 'API\FacilityController',
        'images' => 'API\ImageController',
    ]);

});

    

Route::get('users', 'API\UserController@index');
Route::get('users/{user}', 'API\UserController@show');

Route::get('complexes', 'API\ComplexController@index');
Route::get('complexes/{complex}', 'API\ComplexController@show');

Route::get('places', 'API\PlaceController@index');
Route::get('places/{place}', 'API\PlaceController@show');

Route::get('cities', 'API\CityController@index');
Route::get('cities/{city}', 'API\CityController@show');

Route::get('ostans', 'API\OstanController@index');
Route::get('ostans/{ostan}', 'API\OstanController@show');

Route::get('regions', 'API\RegionController@index');
Route::get('regions/{region}', 'API\RegionController@show');

Route::get('comments', 'API\CommentController@index');
Route::get('comments/{comment}', 'API\CommentController@show');

Route::get('likes', 'API\LikeController@index');
Route::get('likes/{like}', 'API\LikeController@show');

Route::get('notifications', 'API\NotificationController@index');
Route::get('notifications/{notification}', 'API\NotificationController@show');

Route::get('fields', 'API\FieldController@index');
Route::get('fields/{field}', 'API\FieldController@show');

Route::get('facilities', 'API\FacilityController@index');
Route::get('facilities/{Facility}', 'API\FacilityController@show');

Route::get('images', 'API\ImageController@index');
Route::get('images/{image}', 'API\ImageController@show');



