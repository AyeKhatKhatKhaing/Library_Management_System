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

//Route::get('/', function () {
//    return view('welcome');
//});

use Illuminate\Support\Facades\Route;

Route::get("login","LoginController@loginView")->name("login");
Route::post("login","LoginController@loginCheck")->name("login");
Route::post("logout","LoginController@logout")->name("logout");

Route::view("/test", 'test');

Route::get('student', 'StudentController@formView')->name('s.name');
Route::post('student', 'StudentController@formRequest')->name('student');
Route::get('student-list', 'StudentController@list')->name('list');
Route::get('student-details/{id}', 'StudentController@detail')->name('s.details');
Route::get('student-delete/{id}', 'StudentController@delete')->name('s.delete');
Route::get('student-edit/{id}', 'StudentController@edit')->name('s.edit');
Route::post('student-update', 'StudentController@update')->name('s.update');

/******************** User Card *********************/
Route::get('/card', 'UserCardController@index')->name('c.name');
Route::get('user_add', 'UserCardController@add')->name('user_add');
Route::post('card', 'UserCardController@store')->name('card');
Route::get('card-edit/{id}', 'UserCardController@edit')->name('c.edit');
Route::post('card-update', 'UserCardController@update')->name('c.update');
Route::get('card-detail/{id}', 'UserCardController@show')->name('c.detail');
Route::get('card-delete/{id}', 'UserCardController@delete')->name('c.delete');
Route::get("/isreg/{barCode}","UserCardController@isReg")->name("c.isReg");

/******************** Book Card *********************/
Route::get('book', 'BookCardController@index')->name('b.name');
Route::get('book_add', 'BookCardController@add')->name('add');
Route::post('book', 'BookCardController@store')->name('book');
Route::get('book-edit/{id}', 'BookCardController@edit')->name('b.edit');
Route::post('book-update', 'BookCardController@update')->name('b.update');
Route::get('book-delete/{id}', 'BookCardController@delete')->name('b.delete');
Route::get('book-detail/{id}', 'BookCardController@show')->name('b.detail');
Route::get("bookinfo/{barCode}","BookCardController@bookInfo")->name("b.info");

/********************Borrow Book *********************/
Route::get('borrow', 'BorrowInfoController@index')->name('bb.index');
Route::get('return', 'BorrowInfoController@return')->name('bb.return');
Route::get('return-save/{barCode}', 'BorrowInfoController@returnSave')->name('bb.returnSave');

Route::get("borrow-info","BorrowInfoController@list")->name("bb.info");
Route::get("borrow-expired","BorrowInfoController@expired")->name("bb.expired");
Route::get("borrow-detail/{id}","BorrowInfoController@detail")->name("bb.detail");

Route::get("borrow-store/{barCode}","BorrowInfoController@store")->name("bb.store");

Route::get("borrow-list/{code}/{id}","BorrowListController@store")->name("bl.store");

Route::get("return-check/{barCode}","BorrowInfoController@returnCheck");

Route::get('fine/{barCode}', 'BorrowInfoController@fineShow')->name('bb.fineShow');
Route::get('fine-save/{barCode}', 'BorrowInfoController@fineSave')->name('bb.fineSave');
Route::get("fine-list","BorrowInfoController@fineList")->name("bb.fineList");


Route::get('/', function () {
    return view('dashboard');
})->middleware("auth")->name("dashboard");
