<?php

use Illuminate\Http\Request;

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

Route::post('login', 'LoginController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:admin')->get('/admin', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:principal')->get('/principal', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:student')->group(function () {
    Route::get('/student',function (Request $request){
        return $request->user();  
    });
    Route::get('student/getAllStudent','StudentDetailController@index');
    Route::put('student/update/{id}','StudentDetailController@update');
    Route::get('student/show/{id}', 'StudentDetailController@show');
    });



    Route::middleware('auth:staff')->group(function () {
    Route::get('/staff',function (Request $request){
        return $request->user();  
    });
    Route::get('staff/getAllStaff','StaffDetailController@index');
    Route::get('staff/show/{id}', 'StaffDetailController@show');
    Route::put('staff/update/{id}','StaffDetailController@update');
    });




Route::post('student/add', 'StudentDetailController@store');
Route::post('staff/add', 'StaffDetailController@store');

