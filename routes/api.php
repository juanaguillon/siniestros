<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(["cors"])->group(function () {

  Route::get("client/all", "ClientController@getClients");
  Route::post("client/create", "ClientController@create");
  Route::post("client/update/{clientid}", "ClientController@updateById");
  Route::get("client/get/{clientid}", "ClientController@getById");

  Route::post("user/create", "UserController@create");
  Route::post("user/login", "UserController@createLogin");

  Route::get("policy/all", "PolicyController@getAllPolicies");
  Route::post("policy/create", "PolicyController@create");

  Route::post("insure/create", "InsureController@create");
  Route::get("insure/all", "InsureController@getAll");

  Route::post("sinister/create", "SinisterController@create");

  Route::post("person/create", "PersonController@create");
});
