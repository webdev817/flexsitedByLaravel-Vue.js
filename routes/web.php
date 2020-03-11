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

// adadad
Auth::routes();


ROute::get('devmawaisnow','HomeController@mawaisnow');


Route::group(['middleware' => ['auth']], function () {
  Route::get('/','HomeController@root')->name('root');

  Route::post('domainSelected','WizeredController@domainSelected')->name('domainSelected');
  Route::get('select-design','WizeredController@selectDesign')->name('select-design');
  Route::get('selectedDesign/{designId}','WizeredController@selectedDesign')->name('selectedDesign');
  Route::get('websitePackege','WizeredController@websitePackege')->name('websitePackege');
  Route::get('selectedWebsitePackege/{packegeNo}','WizeredController@selectedWebsitePackege')->name('selectedWebsitePackege');
  Route::get('planAndBilling/{planNo}','WizeredController@planAndBilling')->name('planAndBilling');
  Route::get('businessInformation','WizeredController@businessInformation')->name('businessInformation');

  Route::get('incompletePaymentCompleted','WizeredController@incompletePaymentCompleted')->name('incompletePaymentCompleted');
  Route::post("storeBilling", "WizeredController@storeBilling")->name('storeBilling');
  Route::post("businessInformationStore", "WizeredController@businessInformationStore")->name('businessInformationStore');

  Route::get('/home', 'HomeController@root')->name('home');
  Route::get('/oldHome', 'HomeController@index')->name('home');
  Route::get('/domainSearch','HomeController@domainSearch')->name('domainSearch');

  Route::get('privacy-policy','HomeController@privacyPolicy')->name('privacyPolicy');


  Route::get('createAllPlans','BillingController@createAllPlans')->name('createAllPlans');

  Route::get('supportPortalHome','GeneralController@supportPortalHome')->name('supportPortalHome');

});

Route::group(['middleware' => ['auth', 'SuperAdminOnly']], function () {

  Route::resource('users','UsersController');
  Route::get('switchPageWidth','GeneralController@switchPageWidth')->name('switchPageWidth');

});



Route::post( 'stripe/webhook', 'WebhookController@handleWebhook' );
