<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
|
*/


//Home Controller
Route:: get('/', 'HomeController@index'); //Home page of the website

Route:: get('/login', 'HomeController@renderLoginView'); //Login View
Route:: post('/login', 'HomeController@loginAdmin'); //Handle login process
Route:: get('/logout', 'HomeController@destroy'); //Logout Admin users

Route::get('/register', 'HomeController@renderRegistrationView'); // Registration Form View
Route::post('/register', 'HomeController@register'); //Handle registration process

Route::get('/reset', 'HomeController@renderResetView');// Reset View
Route::post('/reset', 'HomeController@sendResetPassword'); // Form to handle Reset Request
Route::get('/resetpassword', 'HomeController@renderResetPasswordView'); //Reset Password after Access code is sent to email
Route::post('/resetpassword', 'HomeController@resetPassword');//Form to handle reset password process




//Public Controller
Route::get('/public', 'PublicController@index');
Route::get('/public/api', 'PublicController@api'); //Handles API calls

//Admin Controller
Route:: get('/admin', 'AdminController@renderIndexView');// Display all PSAP Registry Entries
Route:: get('/admin/reset', 'AdminController@renderResetPasswordView'); // Render Reset View
Route:: post('/admin/reset', 'AdminController@resetPassword'); // Handle reset password process
Route::get('/admin/edit', 'AdminController@renderEditProfileView'); // Render Edit View
Route::post('/admin/edit', 'AdminController@editProfile'); // Handle edit profile process
Route::get('/admin/manage', 'AdminController@renderManageAdminView'); // Render Manage Admin View
Route::get('/admin/delete/{id}', 'AdminController@deleteAdmin');// Delete Admin User with id
Route::get('/admin/add', 'AdminController@renderAddAdminView'); // render Add Admin
Route::post('/admin/add', 'AdminController@addAdmin'); // Add New Admin User


//Private Controller
Route:: get('/private', 'PrivateController@renderIndexView'); //Display PSAP Entries that belong to that user
Route:: get('/private/reset', 'PrivateController@renderResetPasswordView'); // Render Reset View
Route:: post('/private/reset', 'PrivateController@resetPassword'); // Handle reset password process
Route::get('/private/edit', 'PrivateController@renderEditProfileView'); // Render Edit View
Route::post('/private/edit', 'PrivateController@editProfile'); // Handle edit profile process


//Registry Controller
Route:: get('/registry/delete/{id}', 'RegistryController@destroy');
Route:: get('/registry/edit/{id}', 'RegistryController@edit');
Route:: post('/registry/edit', 'RegistryController@update');
Route:: get('/registry/create', 'RegistryController@renderCreateEntryView');
Route:: post('/registry/create', 'RegistryController@createEntry');


//Handle 404 Errors

App::missing(function($exception)
{
    return Redirect::to('404error');
});

Route:: get('404error', function(){
   return View::make('404error');
});
