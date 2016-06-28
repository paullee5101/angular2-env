<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/api/view', function () {
    View::addExtension('html','php');
    return View::make('index');
});

/**
 * Users module routes
 * */
Route::post('/api/users/signIn', 'UsersController@signIn');
Route::post('/api/users/signUp', 'UsersController@signUp');
Route::get('/api/users/myProfile', 'UsersController@getUserProfile');
Route::post('/api/users/updateProfile', 'UsersController@updateUserProfile');
Route::get('/api/users/invitationList', 'UsersController@getInvitationList');
Route::post('/api/users/invite', 'UsersController@invite');

/**
 * Memberships module routes 
 * */
Route::post('/api/memberships/requestIntroduction', 'MembershipsController@requestIntroduction');
Route::post('/api/memberships/acceptInvitation', 'MembershipsController@acceptInvitation');
Route::get('/api/memberships/membershipPurchaseDetails', 'MembershipsController@getMembershipPurchaseDetails');
Route::post('/api/memberships/updatePurchaseDetails', 'MembershipsController@updatePurchaseDetails');
Route::post('/api/memberships/updatePurchaseStatus', 'MembershipsController@updatePurchaseStatus');
Route::post('/api/memberships/purchaseList', 'MembershipsController@getPurchaseList');

/**
 * Contacts module routes
 * */
Route::post('/api/contacts/uploadCSV', 'ContactsController@uploadCSV');
Route::get('/api/contacts/contactList', 'ContactsController@getContactList');