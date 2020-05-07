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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
Route::post("users", "AuthController@store");
Route::post("login", "AuthController@login");
Route::post("logout", "AuthController@logout");
Route::post("change-password", "AuthController@changePassword");

Route::get("me", "MeController@me");
Route::get("getavatar", "MeController@getAvatar");
Route::post("create-user", "MeController@CreateUser");

Route::post("user-update", "MeController@Userupdate");
Route::post("uploadphoto", "MeController@uploadPicture");
Route::get("user-details/{id}", "MeController@getUserDetails");
Route::get("user-details-two/{id}", "MeController@getUserDetailsTwo");

Route::delete("deleteuser/{id}", "MeController@deleteUser");
Route::get("userdues", "MeController@getAllUserDues");
Route::post("updateuser", "MeController@updateuser");
Route::get("user-data", "MeController@getSingleUser");
Route::get("user-profile-data", "MeController@getUserProfile");

Route::get("userinfo",  "MeController@getUser");
Route::get("users", "MeController@getAllUsers");
Route::post("dues", "DuesController@storedues");
Route::get("currentmonth", "DuesController@getMonth");
Route::get("currentyear", "DuesController@getYear");

Route::get("totaldues", "DuesController@totaldues");
Route::get("countusers", "MeController@countusers");
Route::put("updaterole/{id}", "MeController@updaterole");

});

Route::post("/forgot-password", "ForgotPasswordController@sendResetLinkEmail");
Route::post("/reset-password", "ResetPasswordController@reset");
