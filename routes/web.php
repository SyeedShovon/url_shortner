<?php

use App\Http\Controllers\Url_controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Url_controller::class,'index']);
Route::post('generateLink',[Url_controller::class,'store']);
Route::get('{code}',[Url_controller::class,'shortLink']);