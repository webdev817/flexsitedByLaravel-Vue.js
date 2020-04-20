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


Route::get('devmawaisnow', 'HomeController@mawaisnow');


Route::get('invite/{invitedBy}', 'ReferalController@invite')->name('invite');
Route::get('welcomeFlexsited/{invitedBy}', 'ReferalController@welcomeFlexsited')->name('welcomeFlexsited');
Route::post('saveReferal', 'ReferalController@saveReferal')->name('saveReferal');



Route::group(['middleware' => ['auth']], function () {

  Route::get('projectChat','API\ProjectChatController@index')->name('projectChatApi');
  Route::post('projectChatMine','API\ProjectChatController@projectChatMine')->name('projectChatMine');
  Route::post('projectChat','API\ProjectChatController@store');
  Route::post('projectMilestone\{project}','ProjectController@projectMilestone')->name('projectMilestone');

  Route::get('updateProjectDueDate','ProjectController@updateProjectDueDate')->name('updateProjectDueDate');
  
  Route::get('approveProject/{project}','ProjectController@approveProject')->name('approveProject');

  Route::post('commentMilestone\{projectAttachment}','ProjectController@commentMilestone')->name('commentMilestone');


  Route::get('contactUs', 'ContactUsController@index')->name('contactUsIndex');
  Route::post('contactUsStore', 'ContactUsController@store')->name('contactUsStore');



  Route::get('marketingService', 'MarketingServiceController@index')->name('marketingServiceIndex');
  Route::post('marketingServiceStore', 'MarketingServiceController@store')->name('marketingServiceStore');

  Route::get('referal', 'ReferalController@index')->name('referal');

  Route::resource('orders', 'OrderController');
  Route::resource('projects', 'ProjectController');

  Route::get('changePassword','UsersController@changePassword')->name('changePasswordSP');
  Route::post('changePasswordStore','UsersController@changePasswordStore')->name('changePasswordSPStore');

  Route::get('profileEdit', 'UsersController@profileEdit')->name('profileEditSp');


  Route::post('closeAccountSp', 'UsersController@closeAccount')->name('closeAccountSp');

  Route::get('support', 'SupportController@index')->name('supportSp');

  Route::resource('tickets','TicketController');

});



Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@root')->name('root');

    Route::post('domainSelected', 'WizeredController@domainSelected')->name('domainSelected');
    Route::get('select-design', 'WizeredController@selectDesign')->name('select-design');
    Route::get('selectedDesign/{designId}', 'WizeredController@selectedDesign')->name('selectedDesign');
    Route::get('websitePackege', 'WizeredController@websitePackege')->name('websitePackege');
    Route::get('selectedWebsitePackege/{packegeNo}', 'WizeredController@selectedWebsitePackege')->name('selectedWebsitePackege');
    Route::get('planAndBilling/{planNo}', 'WizeredController@planAndBilling')->name('planAndBilling');
    Route::get('businessInformation', 'WizeredController@businessInformation')->name('businessInformation');

    Route::get('incompletePaymentCompleted', 'WizeredController@incompletePaymentCompleted')->name('incompletePaymentCompleted');
    Route::post("storeBilling", "WizeredController@storeBilling")->name('storeBilling');
    Route::post("businessInformationStore", "WizeredController@businessInformationStore")->name('businessInformationStore');

    Route::get('/home', 'HomeController@root')->name('home');
    Route::get('/oldHome', 'HomeController@index')->name('home');
    Route::get('/domainSearch', 'HomeController@domainSearch')->name('domainSearch');

    Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacyPolicy');


    Route::get('createAllPlans', 'BillingController@createAllPlans')->name('createAllPlans');

    Route::get('supportPortalHome', 'GeneralController@supportPortalHome')->name('supportPortalHome');

    Route::get('subscription/invoice/{id}', 'BillingController@invoiceDownload')->name('invoiceDownload');
    Route::get('couponInfo', 'CouponController@couponInfo')->name('couponInfo');
});













Route::get('admin/login', 'AdminController@login')->name('adminLogin');
Route::post('adminLogin', 'AdminController@adminLogin')->name('adminLoginPost');




Route::group(['prefix'=> 'admin' ,'middleware' => ['auth', 'SuperAdminOnly']], function () {

    Route::get('/home', 'AdminController@home')->name('adminHome');
    Route::resource('users', 'UsersController');
    Route::get('clientOnBoarding/{user}', 'UsersController@clientOnBoarding')->name('clientOnBoarding');
    Route::post('changeUserStatus', 'UsersController@changeUserStatus')->name('changeUserStatus');
    Route::post('deleteUser', 'UsersController@deleteUser')->name('deleteUser');
    Route::get('subscriptionHistory/{subscriptionId}', 'BillingController@subscriptionHistory')->name('subscriptionHistory');
    Route::post('cancelSubscription', 'BillingController@cancelSubscription')->name('cancelSubscription');
    Route::get('allSubscriptions','BillingController@allSubscriptions')->name('allSubscriptions');

    Route::get('switchPageWidth', 'GeneralController@switchPageWidth')->name('switchPageWidth');
    Route::resource('coupons', 'CouponController');

    Route::get('edit/clientOnBoarding/{userId}', 'WizeredController@clientOnBoardingEdit')->name('clientOnBoardingEdit');
    Route::post('clientOnBoardingStore', 'WizeredController@clientOnBoardingStore')->name('clientOnBoardingStore');

    Route::resource('supportFAQ', 'SupportFAQController');


});

Route::get('log',function () {
  getDataFromDisk();
});

Route::redirect('admin', 'admin/home');

Route::get('logmeout',function () {
  Auth::logout();
  return redirect('login');
});
Route::post('stripe/webhook', 'WebhookController@handleWebhook');
