<?php

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


Auth::routes();


ROute::get('devmawaisnow','HomeController@mawaisnow');


Route::group(['middleware' => ['auth']], function () {
  Route::get('/','HomeController@root')->name('root');

  Route::post('domainSelected','WizeredController@domainSelected')->name('domainSelected');
  Route::get('select-design','WizeredController@selectDesign')->name('select-design');
  Route::get('selectedDesign/{designId}','WizeredController@selectedDesign')->name('selectedDesign');
  Route::get('websitePackege','WizeredController@websitePackege')->name('websitePackege');

  Route::get('/home', 'HomeController@root')->name('home');
  Route::get('/oldHome', 'HomeController@index')->name('home');
  Route::get('/domainSearch','HomeController@domainSearch')->name('domainSearch');
});
