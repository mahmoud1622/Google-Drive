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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//===============DriveController Routes =============
// display all data
Route::get('drives',"DriveController@index")->name('drives.index');
// To Go Create Page
Route::get('drives/create',"DriveController@create")->name('drives.create');
// Store Database
Route::post('drives/create',"DriveController@store")->name('drives.store');
// Show one item
Route::get('drives/show/{id}',"DriveController@show")->name('drives.show');
// Go to Edit Page
Route::get('drives/edit/{id}',"DriveController@edit")->name('drives.edit');
// To Updata in Database
Route::post('drives/update/{id}',"DriveController@updata")->name('drives.update');
// Delete From Database
Route::get('drives/remove/{id}',"DriveController@destory")->name('drives.destory');
// Download file
Route::get('drives/download/{id}',"DriveController@download")->name('drives.download');

//=============== End DriveController Routes =============



