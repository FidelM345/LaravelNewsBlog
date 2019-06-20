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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List Articles
Route::get('articles','ArticlesController@index');

//List Single article
Route::get('articles/{id}','ArticlesController@show');

//create new article
Route::post('articles','ArticlesController@create');

//update article
Route::put('articles/{id}','ArticlesController@store');

//delete article
Route::delete('articles/{id}','ArticlesController@destroy');
