<?php
use Illuminate\Support\Facades\Redis;
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
});

Route::get('/timeline','TimelineController@index');
// post chat msg
Route::post('/send','TimelineController@postMsg');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
