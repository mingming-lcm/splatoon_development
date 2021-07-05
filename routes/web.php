<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/update_iksm', 'HomeController@update_iksm')->name('update_iksm');
Route::get('/get_iksm', 'HomeController@get_iksm')->name('get_iksm');
Route::get('/timetable', 'TimetableController@index')->name('timetable');
Route::get('/record', 'RecordController@index')->name('record');

Route::get('/result', 'ResultController@index')->name('result.index');
Route::get('/result/{battle_number}', 'ResultController@detail')->name('result.detail');

#Route::get('/timetable', function () {
#    return view('timetable');
#})->name('timetable');
