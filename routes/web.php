<?php

use Laravel\Passport\Passport;

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

Route::get('/', 'PagesController@home');
Route::get('/communications/newsletters', 'CommunicationsController@newsletters');
Route::get('/communications/questions', 'CommunicationsController@questions');
Route::get('/resources', 'ResourcesController@index');
Route::get('/resources/bylaws', 'ResourcesController@bylaws');
Route::get('/resources/goals', 'ResourcesController@goals');
Route::get('/board', 'BoardController@index');
Route::get('/members', 'MembersController@index');
Route::get('/members/apply', 'MembersController@apply');
Route::get('/communications/topics', 'PostsController@index');
Route::get('/communications/topics/{post}', 'PostsController@show');


Route::get('/conferences', 'ConferenceController@index')->name('conferences.home');
Route::post('/conferences', 'ConferenceController@Order');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {
    Route::get('/', 'Admin\PagesController@spa');
    Route::get( '/{any}', 'Admin\PagesController@spa')->where('any', '.*' );
});
Auth::routes();


