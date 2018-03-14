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

Route::get('/', function () 
{
    return view('welcome');
});

Auth::routes();

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getfolders', 'GoogleDriveController@getfolders')->name('getfolders');

Route::get('/listFilesInFolder/{folder_id}', 'GoogleDriveController@listFilesInFolder')->name('listFilesInFolder');

Route::get('/file_upload', function()
{
    
    return view('file_upload.index');
})->name('file_upload');
