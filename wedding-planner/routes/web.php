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

Route::get('/', 'Web\\SiteController@index','home');

Route::get('/register-relation/{token}', 'Web\\SiteController@registerRequest');
Route::post('/register-relation', 'Web\\SiteController@proccessRegisterRequest');
Route::get('/reset-your-password/{token}', 'Web\\SiteController@resetPassword');
Route::post('/reset-your-password/{token}', 'Web\\SiteController@proccessResetPassword');

Route::get('/success', 'Web\\SiteController@success');

Route::get('/support', 'Web\\SiteController@support');

//cms
Route::get('/about', ['as' => 'cms.about', 'uses' => 'Web\CmsController@about']);
Route::get('/testimonials', ['as' => 'cms.testimonials', 'uses' => 'Web\CmsController@testimonials']);
Route::get('/contactus', ['as' => 'cms.contactus', 'uses' => 'Web\CmsController@contactus']);
Route::get('/services', ['as' => 'cms.services', 'uses' => 'Web\CmsController@services']);
Route::post('/add-contactus', ['as' => 'cms.contact_us', 'uses' => 'Web\CmsController@insert_contact_us']);
//vendor
Route::get('/vendors', ['as' => 'vendors', 'uses' => 'Web\VendorDetailController@index']);
Route::get('/vendors/{slug}/{id}', ['as' => 'vendors.category', 'uses' => 'Web\VendorDetailController@vendor_category']);
Route::get('/vendors/vendor_category_fetch', ['as' => 'vendors.category_fetch', 'uses' => 'Web\VendorDetailController@vendor_category_fetch']);

Route::get('/vendor-detail/{id}', ['as' => 'vendors.detail', 'uses' => 'Web\VendorDetailController@vendor_detail']);
Route::get('/vendor-inquiry/{id}', ['as' => 'vendors.inquiry', 'uses' => 'Web\VendorDetailController@vendor_inquiry']);
Route::post('/add-inquiry', ['as' => 'vendor.inquiry', 'uses' => 'Web\VendorDetailController@insert_inquiry']);
Route::get('/thankyou', ['as' => 'vendor.thankyou', 'uses' => 'Web\VendorDetailController@thankyou']);

//user login
Route::get('/user-login', ['as' => 'user.login', 'uses' => 'Web\LoginController@user_login']);
Route::get('/user-logout', ['as' => 'user.logout', 'uses' => 'Web\LoginController@user_logout']);
Route::post('/do-login', ['as' => 'user.dologin', 'uses' => 'Web\LoginController@do_login']);
Route::get('/verify-user/{id}', ['as' => 'user.verify_user', 'uses' => 'Web\LoginController@verify_user']);
Route::get('/verify-vendor/{id}', ['as' => 'user.verify_vendor', 'uses' => 'Web\LoginController@verify_vendor']);
Route::post('/check_vefication_code', ['as' => 'user.check_vefication_code', 'uses' => 'Web\LoginController@check_vefication_code']);
Route::post('/check_vendor_vefication_code', ['as' => 'user.check_vendor_vefication_code', 'uses' => 'Web\LoginController@check_vendor_vefication_code']);
Route::get('/vendor-login', ['as' => 'vendor.login', 'uses' => 'Web\LoginController@vendor_login']);
Route::get('/vendor-logout', ['as' => 'vendor.logout', 'uses' => 'Web\LoginController@vendor_logout']);
Route::post('/vendor-do-login', ['as' => 'vendor.dologin', 'uses' => 'Web\LoginController@vendor_do_login']);
//vendor register
Route::get('/vendor-register', ['as' => 'vendor.register', 'uses' => 'Web\LoginController@vendor_register']);
Route::post('/do-register', ['as' => 'vendor.doregister', 'uses' => 'Web\LoginController@do_register']);

//enquiry list
Route::get('/user-enquiry-list', ['as' => 'vendor.enquiry', 'uses' => 'Web\EnquiryController@index']);
Route::get('/vendor-enquiry-list', ['as' => 'vendor.vendor_enquiry', 'uses' => 'Web\EnquiryController@vendor_list']);
 Route::get('/enquiry/data', ['as' => 'vendor.enquirydata', 'uses' => 'Web\\EnquiryController@listIndex']);
/**
 * Admin Routes
 */
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'admin', 'uses' => 'Admin\DashboardController@index']);
    
    Route::get('/user/profile', ['as' => 'user.profile', 'uses' => 'Admin\UserController@profile']);
    Route::post('/user/profile', ['as' => 'user.profile', 'uses' => 'Admin\UserController@updateProfile']);
    
    Route::get('/concept/data', ['as' => 'concept.data', 'uses' => 'Admin\\ConceptController@listIndex']);
	Route::resource('/concept', 'Admin\\ConceptController');
    
    Route::get('/category/data', ['as' => 'category.data', 'uses' => 'Admin\\CategoryController@listIndex']);
    Route::resource('/category', 'Admin\\CategoryController');

    Route::get('/user/data', ['as' => 'user.data', 'uses' => 'Admin\\UserController@listIndex']);
	Route::resource('/user', 'Admin\\UserController');
    
    Route::get('/user-app/data', ['as' => 'user-app.data', 'uses' => 'Admin\\UserAppController@listIndex']);
	Route::resource('/user-app', 'Admin\\UserAppController');
    
    Route::get('/user-relation/data', ['as' => 'user-relation.data', 'uses' => 'Admin\\UserRelationController@listIndex']);
    Route::get('/concept/user-data/{userRelationId}', ['as' => 'concept.user-data', 'uses' => 'Admin\\UserRelationController@listConceptsIndex']);
	Route::resource('/user-relation', 'Admin\\UserRelationController');
    
    Route::get('/procedure/data', ['as' => 'procedure.data', 'uses' => 'Admin\\ProcedureController@listIndex']);
	Route::resource('/procedure', 'Admin\\ProcedureController');
    
    Route::get('/term-of-use/data', ['as' => 'term-of-use.data', 'uses' => 'Admin\\TermOfUseController@listIndex']);
	Route::resource('/term-of-use', 'Admin\\TermOfUseController');
    
    Route::get('/privacy-policy/data', ['as' => 'privacy-policy.data', 'uses' => 'Admin\\PrivacyPolicyController@listIndex']);
	Route::resource('/privacy-policy', 'Admin\\PrivacyPolicyController');
    
    Route::get('/about-us/data', ['as' => 'about-us.data', 'uses' => 'Admin\\AboutUsController@listIndex']);
	Route::resource('/about-us', 'Admin\\AboutUsController');
    
    Route::get('/content/data/{id}/{userRelationId}', ['as' => 'content.data', 'uses' => 'Admin\\ContentController@listIndex']);
    Route::get('/content/{id}/{userRelationId}', ['as' => 'content.index', 'uses' => 'Admin\\ContentController@index']);
    Route::get('/content/{id}', ['as' => 'content.show', 'uses' => 'Admin\\ContentController@show']);
    
    Route::get('/content-detail/data/{id}', ['as' => 'content-detail.data', 'uses' => 'Admin\\ContentDetailController@listIndex']);
    Route::get('/content-detail/{id}', ['as' => 'content-detail.show', 'uses' => 'Admin\\ContentDetailController@show']);
    
    Route::get('/content-detail-list/data/{id}', ['as' => 'content-detail-list.data', 'uses' => 'Admin\\ContentDetailListController@listIndex']);
    Route::get('/content-detail-list/{id}', ['as' => 'content-detail-list.show', 'uses' => 'Admin\\ContentDetailListController@show']);
    Route::get('/vendor/data', ['as' => 'vendor.data', 'uses' => 'Admin\\VendorController@listIndex']);
	Route::resource('/vendor', 'Admin\\VendorController');
        Route::get('/vendor/{id}', ['as' => 'vendor.show', 'uses' => 'Admin\\VendorController@show']);

    Route::get('/vendor-detail/data/{id}', ['as' => 'vendor-detail.data', 'uses' => 'Admin\\VendorDetailController@listIndex']);
    Route::get('/vendor-detail/create/{vendorId}', ['as' => 'vendor-detail.create', 'uses' => 'Admin\\VendorDetailController@create']);
    Route::post('/vendor-detail/create/{vendorId}', ['as' => 'vendor-detail.store', 'uses' => 'Admin\\VendorDetailController@store']);
    Route::get('/vendor-detail/{id}/edit', ['as' => 'vendor-detail.edit', 'uses' => 'Admin\\VendorController@edit']);
    Route::patch('/vendor-detail/{id}', ['as' => 'vendor-detail.update', 'uses' => 'Admin\\VendorController@update']);
    Route::delete('/vendor-detail/{id}', ['as' => 'vendor-detail.delete', 'uses' => 'Admin\\VendorDetailController@delete']);
    //enqiry
    Route::get('/enquiry-list', ['as' => 'admin.vendor.enquiry', 'uses' => 'Admin\EnquiryController@index']);
    Route::get('/contactus-list', ['as' => 'admin.contactus', 'uses' => 'Admin\ContactUsController@index']);
    Route::get('/site-user-list', ['as' => 'admin.siteuser', 'uses' => 'Admin\SiteUserController@index']);
    Route::get('/message/data', ['as' => 'message.data', 'uses' => 'Admin\\MessageController@listIndex']);
	Route::resource('/message', 'Admin\\MessageController');
});