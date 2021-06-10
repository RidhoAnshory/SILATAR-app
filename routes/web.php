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

// Route::get('home', function () {
//    return view('home');
// });

Route::get('/', function () {
  return view('auths.login');
});

Route::get('charts', function () {
  return view('chart.chartjss');
});
Route::get('chart', 'DashboardController@chart');


//Route::get('laporan', function () {
  //  return view('laporan', '');
//});



Route::get('login', 'AuthController@login')->name('login');
Route::post('postlogin', 'AuthController@postlogin');
Route::get('logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:Kecamatan/Kelurahan']],function(){
  Route::get('akunrt', 'AkunrtController@data');
  Route::get('akunrt/add', 'AkunrtController@add');
  Route::post('akunrt', 'AkunrtController@store');
  Route::get('akunrt/edit/{id}', 'AkunrtController@edit');
  Route::patch('akunrt/{id}', 'AkunrtController@editprocess');
  Route::delete('akunrt/{id}', 'AkunrtController@delete');
  Route::patch('password', 'PasswordController@update') ;
  Route::post('filter', 'DashboardController@filter')->name('filter');
  Route::get('dashboard', 'DashboardController@data') ;
  Route::get('dashboard/{id}', 'DashboardController@show')->name('show');
  Route::post('editstatus/{id}', 'DashboardController@update');


  //Routing Export
  Route::post('export', 'DashboardController@export')->name('export');

  
});
  
Route::group(['middleware' => ['auth','checkRole:RT']],function(){
  Route::get('laporan', 'LaporanController@data');
  Route::get('laporan/add', 'LaporanController@add');
  Route::post('laporan', 'LaporanController@addprocess');
  Route::get('laporan/edit/{id}', 'LaporanController@edit');
  Route::post('laporan/{id}', 'LaporanController@update');
  Route::delete('laporan/{id}', 'LaporanController@delete');
  Route::get('password', 'PasswordController@edit') ;
  Route::patch('password', 'PasswordController@update') ;
  Route::get('informasi', 'InformasiController@edit');
  Route::patch('informasi', 'InformasiController@update');
});