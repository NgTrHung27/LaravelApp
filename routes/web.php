<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

// Route::get('products', [ProductsController::class, 'index']);
// Route::get('products/{productName}/{id}', [
//     ProductsController::class,
//     'details'
// ])->where(['productName' => '[a-zA-Z0-9]+', 'id' => '[0-9]+']);
// Route::get('products/{productName}', [ProductsController::class, 'details']);
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);



//------------------------------------------
//response view
// Route::get('/', function () {
//     return view('home');
// });
// //response a String
// Route::get('/users', function () {
//     return 'This is Hung User Page yetsir';
// });
// // response an array
// Route::get('/foods', function () {
//     return ['sushi', 'sashimi', 'bunbo'];
// });
// // response an object = associative array
// Route::get('/aboutMe', function () {
//     return response()->json(['name' => 'Nguyen Trung Hung', 'email' => 'trunghungpq456@gmail.com']);
// });
// // response another request = redirect - chuyển trang
// Route::get('/somthing', function () {
//     return  redirect('/foods');
// });
