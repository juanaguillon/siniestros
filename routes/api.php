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
  Route::post("client/create", "ApiController@createClient");

  Route::post("user/create", "UserController@create");
  Route::post("user/login", "UserController@createLogin");

  Route::get("policy/all", "PolicyController@getAllPolicies");
  Route::post("policy/create", "PolicyController@create");

  Route::post("insure/create", "InsureController@create");

  Route::post("sinister/create", "SinisterController@create");

  Route::post("person/create", "PersonController@create");
});
