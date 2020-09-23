<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login','App\Http\Controllers\Homecontroller@login');
Route::post('checklogin','App\Http\Controllers\Homecontroller@checklogin');
Route::get('forgot','App\Http\Controllers\Homecontroller@forgotpassword');


Route::group(['middleware'=>['Customauth']],function(){
  Route::get('admin/dashboard','App\Http\Controllers\Homecontroller@dashboard');

  ### App Intro Video ###

  Route::get('admin/app_intro_video','App\Http\Controllers\Masters@app_intro_video');
  Route::post('save_intro_video','App\Http\Controllers\Masters@save_intro_video');


});
