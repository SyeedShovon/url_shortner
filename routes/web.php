<?php

use App\Http\Controllers\Url_controller;
use Illuminate\Support\Facades\Route;

Route::get('/',[Url_controller::class,'index']);
Route::post('generateLink',[Url_controller::class,'store']);
route::get('/delete/{id}',[Url_controller::class,'delete']);