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

 /* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::post('login','Api\UserController@login');
Route::post('register','Api\UserController@register');


Route::group(['middleware' => 'auth:api'],function(){
   Route::post('Userdetails', 'Api\UserController@UserDetails');
   Route::post('product','Api\ProductController@Productsave');
   Route::get('Allproduct','Api\ProductController@AllProductview');
   Route::put('UpdateAllproduct/{id}','Api\ProductController@AllProductUpdate');
   Route::get('showAproduct/{id}','Api\ProductController@showAProduct');
   Route::delete('DeleteAllproduct/{id}','Api\ProductController@DeleteProduct');
});
