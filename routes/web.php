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


Route::get('devmawaisnow', 'HomeController@mawaisnow');


Route::get('invite/{invitedBy}', 'ReferalController@invite')->name('invite');
Route::get('welcomeFlexsited/{invitedBy}', 'ReferalController@welcomeFlexsited')->name('welcomeFlexsited');
Route::post('saveReferal', 'ReferalController@saveReferal')->name('saveReferal');


Route::get('privacyPolicy',function () {
  return view('privacyPolicy');
})->name('privacyPolicy');
Route::get('privacyPolicy',function () {
  return view('privacyPolicy');
})->name('privacyPolicya');

Route::get('termsOfService',function () {
  return view('termsOfService');
})->name('termsOfService');


Route::group(['middleware' => ['auth','StatusChecker']], function () {

  Route::post('suggestionStore','HomeController@suggestionStore')->name('suggestionStore');

  Route::get('startProjectWork/{project}','ProjectController@startProjectWork')->name('startProjectWork');
  Route::post('changeProjectStatus/{project}', 'ProjectController@changeProjectStatus')->name('changeProjectStatus');
  Route::get('markNotificationRead','NotificationController@markNotificationRead')->name('markNotificationRead');

  Route::get('projectChat','API\ProjectChatController@index')->name('projectChatApi');
  Route::post('projectChatMine','API\ProjectChatController@projectChatMine')->name('projectChatMine');
  Route::post('projectChat','API\ProjectChatController@store');
  Route::post('projectMilestone/{project}','ProjectController@projectMilestone')->name('projectMilestone');
  Route::get('updateProjectDueDate','ProjectController@updateProjectDueDate')->name('updateProjectDueDate');

  Route::get('approveProject/{project}','ProjectController@approveProject')->name('approveProject');

  Route::post('commentMilestone\{projectAttachment}','ProjectController@commentMilestone')->name('commentMilestone');

  Route::post('projectFeedback\{project}','ProjectController@projectFeedback')->name('projectFeedback');


  Route::get('contactUs', 'ContactUsController@index')->name('contactUsIndex');
  Route::post('contactUsStore', 'ContactUsController@store')->name('contactUsStore');



  Route::get('marketingService', 'MarketingServiceController@index')->name('marketingServiceIndex');
  Route::get('marketingServices', 'MarketingServiceController@marketingServices')->name('marketingServices');
  Route::post('marketingServiceStore', 'MarketingServiceController@store')->name('marketingServiceStore');
  Route::delete('marketingServiceDelete', 'MarketingServiceController@delete')->name('marketingServiceDelete');

  Route::get('referal', 'ReferalController@index')->name('referal');
  Route::get('referals', 'ReferalController@referals')->name('referals');

  Route::resource('orders', 'OrderController');
  Route::resource('projects', 'ProjectController');

  Route::get('profile','UsersController@profile')->name('profile');
  // Route::get('profile',function(){
  //   dd(11);
  // })->name('profile');

  Route::get('changePassword','UsersController@changePassword')->name('changePasswordSP');
  Route::post('changePasswordStore','UsersController@changePasswordStore')->name('changePasswordSPStore');

  Route::get('profileEdit', 'UsersController@edit')->name('profileEditSp');
  Route::resource('users', 'UsersController');

  // Route::get('deleteUsers','UsersController@deleteUsers')->name('deleteUsers');

  Route::post('closeAccountSp', 'UsersController@closeAccount')->name('closeAccountSp');

  Route::get('support', 'SupportController@index')->name('supportSp');
  Route::get('faqs', 'SupportController@faqs')->name('faqs');

  Route::get('downloadAttachment/{id}','ProjectController@downloadAttachment')->name('downloadAttachment');
  
  Route::resource('tickets','TicketController');

  Route::get('myRequests','TicketController@myRequests')->name('myRequests');
  Route::get('ticketRequests','TicketController@myRequests')->name('ticketRequests');

  Route::get('supportChat','SupportController@supportChat')->name('supportChat');


  Route::get('supportChatApi','SupportController@getSupportChatList')->name('supportChatApi');
  Route::post('supportChatApi','SupportController@storeSupportChat')->name('supportChatApi');
  Route::post('supportChatSessionClose/{chartSessionId}','SupportController@supportChatSessionClose')->name('supportChatSessionClose');

  Route::post('supportChatMine','SupportController@supportChatApi')->name('supportChatMine');

  Route::get('supportChatsRequests','SupportController@supportChatsRequests')->name('supportChatsRequests');

  Route::post('updateCard','BillingController@updateCard')->name('updateBilling');


});



Route::group(['middleware' => ['auth','StatusChecker']], function () {
    Route::get('/', 'HomeController@root')->name('root');

    Route::get('website-design', 'WizeredController@websiteDesign')->name('websiteDesign');
    Route::get('graphic-design-billing', 'WizeredController@graphicDesignBilling')->name('graphicDesignBilling');
    Route::get('marketing', 'WizeredController@marketing')->name('marketing');

    Route::post("store-graphic-design-billing", "WizeredController@storeGraphicDesignBilling")->name('storeGraphicDesignBilling');
    Route::post('store-marketing', "WizeredController@storeMarketing")->name('storeMarketing');

    Route::post('domainSelected', 'WizeredController@domainSelected')->name('domainSelected');
    Route::get('select-design', 'WizeredController@selectDesign')->name('select-design');
    Route::get('selectedDesign/{designId}', 'WizeredController@selectedDesign')->name('selectedDesign');

    Route::get('deletePlan','WizeredController@deletePlan')->name('deletePlan');
    
    Route::get('websitePackege', 'WizeredController@websitePackege')->name('websitePackege');
    Route::get('selectedWebsitePackege/{packegeNo}', 'WizeredController@selectedWebsitePackege')->name('selectedWebsitePackege');
    Route::get('planAndBilling/{planNo}', 'WizeredController@planAndBilling')->name('planAndBilling');
    Route::get('businessInformation', 'WizeredController@businessInformation')->name('businessInformation');

    Route::get('orderConfirmation/{order}', 'OrderController@orderConfirmation')->name('orderConfirmation');
    Route::post('orderConfirmationStore/{order}', 'OrderController@orderConfirmationStore')->name('orderConfirmationStore');


    // Route::get('authCompleted','OrderController@authCompleted')->name('authCompleted');

    Route::resource('clientTasks', 'ClientTaskController');
    Route::get('deleteClientTasks','ClientTaskController@deleteClientTasks')->name('deleteClientTasks');
    Route::get('incompletePaymentCompleted', 'WizeredController@incompletePaymentCompleted')->name('incompletePaymentCompleted');
    Route::post("storeBilling", "WizeredController@storeBilling")->name('storeBilling');
    Route::post("businessInformationStore", "WizeredController@businessInformationStore")->name('businessInformationStore');

    Route::get('/home', 'HomeController@root')->name('home');
    Route::redirect('/oldHome', '/')->name('home');
    Route::get('/domainSearch', 'HomeController@domainSearch')->name('domainSearch');

    Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacyPolicy');


    Route::get('createAllPlans', 'BillingController@createAllPlans')->name('createAllPlans');

    Route::redirect('supportPortalHome','/')->name('supportPortalHome');
    // Route::get('supportPortalHome', 'GeneralController@supportPortalHome')->name('supportPortalHome');

    Route::get('subscription/invoice/{id}', 'BillingController@invoiceDownload')->name('invoiceDownload');
    Route::get('couponInfo', 'CouponController@couponInfo')->name('couponInfo');

    Route::get('mySubscriptions','PortalController@mySubscriptions')->name('mySubscriptions');



});













Route::get('admin/login', 'AdminController@login')->name('adminLogin');
Route::post('adminLogin', 'AdminController@adminLogin')->name('adminLoginPost');

Route::get('admin/register', 'AdminController@register');
Route::post('admin/adminRegisterCreate','AdminController@adminRegisterCreate')->name('adminRegisterCreate');


Route::group(['prefix'=> 'admin' ,'middleware' => ['auth', 'SuperAdminOnly']], function () {

    Route::resource('onBoardingFaqs','OnBoardingFaqController');

    Route::get('/home', 'AdminController@home')->name('adminHome');
    Route::get('suggestions','AdminController@suggestions')->name('suggestions');

    Route::get('projectReview', 'ProjectController@projectReview')->name('projectReview');

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
    Route::get('contactUsRequests','AdminController@contactUsRequests')->name('contactUsRequests');

    Route::resource('plans','PlanController');

    Route::get('plans/addonEdit/{id}','PlanController@addonEdit')->name('addonEdit');
    Route::put('plans/addonUpdate/{id}','PlanController@addonUpdate')->name('addonUpdate');

    Route::get('ordersList','OrderController@ordersList')->name('ordersList');
    Route::get('orderEdit/{id}','OrderController@orderEdit')->name('orderEdit');
    Route::post('orderEditStore/{orderId}','OrderController@orderEditStore')->name('orderEditStore');

    Route::post('changeTicketStatus/{ticket}','TicketController@changeTicketStatus')->name('changeTicketStatus');

});

Route::get('log',function () {
  $rr = getDataFromDisk();
  dd(
    $rr
  );
});
Route::get('systemStatusKeaHai',function () {
$str1 = 'free -m | awk \'NR==2{printf "Memory Usage: %s/%sMB (%.2f%%)\n", $3,$2,$3*100/$2 }\'';
$str2 = 'df -h | awk \'$NF=="/"{printf "Disk Usage: %d/%dGB (%s)\n", $3,$2,$5}\'';
$str3 = 'top -bn1 | grep load | awk \'{printf "CPU Load: %.2f\n", $(NF-2)}\'';

  $r1 = shell_exec($str1);
  $r2 = shell_exec($str2);
  $r3 = shell_exec($str3);
  dd(
    $r1,
    $r2,
    $r3
  );
});


Route::redirect('admin', 'admin/home');

Route::get('logmeout',function () {
  Auth::logout();
  return redirect('login');
});
Route::post('stripe/webhook', 'WebhookController@handleWebhook');
