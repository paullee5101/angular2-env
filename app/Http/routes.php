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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Users module routes
 * */
Route::post('/users/signIn', 'UsersController@signIn');
Route::post('/users/signUp', 'UsersController@signUp');
Route::get('/users/myProfile', 'UsersController@getUserProfile');
Route::post('/users/updateProfile', 'UsersController@updateUserProfile');
Route::get('/users/invitationList', 'UsersController@getInvitationList');
Route::post('/users/invite', 'UsersController@invite');

/**
 * Memberships module routes 
 * */
Route::post('/memberships/requestIntroduction', 'MembershipsController@requestIntroduction');
Route::post('/memberships/acceptInvitation', 'MembershipsController@acceptInvitation');
Route::get('/memberships/membershipPurchaseDetails', 'MembershipsController@getMembershipPurchaseDetails');
Route::post('/memberships/updatePurchaseDetails', 'MembershipsController@updatePurchaseDetails');
Route::post('/memberships/updatePurchaseStatus', 'MembershipsController@updatePurchaseStatus');
Route::post('/memberships/purchaseList', 'MembershipsController@getPurchaseList');

/**
 * Contacts module routes
 * */
Route::post('/contacts/uploadCSV', 'ContactsController@uploadCSV');
Route::get('/contacts/contactList', 'ContactsController@getContactList');