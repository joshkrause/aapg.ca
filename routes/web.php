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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/communications/newsletters', 'CommunicationsController@newsletters');
Route::get('/communications/questions', 'QuestionsController@questions');
Route::post('/communications/questions', 'QuestionsController@submit');
Route::get('/resources', 'ResourcesController@index');
Route::get('/resources/bylaws', 'ResourcesController@bylaws');
Route::get('/resources/goals', 'ResourcesController@goals');
Route::get('/resources/{category}', 'ResourcesController@category');
Route::get('/board', 'BoardController@index');
Route::get('/members', 'MembersController@index');
Route::get('/members/apply', 'MembersController@apply');
Route::get('/communications/topics', 'PostsController@index');
Route::get('/communications/topics/{post}', 'PostsController@show');
Route::get('/portal', 'PortalController@index')->middleware(['auth', 'board']);
Route::get('/conferences/archive', 'PortalController@index');
Route::get('/alert', 'AlertController@index');
Route::get('/alert/members', 'PortalController@index');
Route::get('/alert/news', 'PortalController@index');
Route::get('/alert/nominate', 'PortalController@index');

Route::get('/conferences', 'ConferenceController@index')->name('conferences.home');
Route::post('/conferences', 'ConferenceController@Order');
Route::get('/conferences/affiliate', 'ConferenceController@affiliate')->name('conferences.affiliate');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {
    Route::get('/', 'Admin\PagesController@dashboard');
    Route::resource('users', 'Admin\UserController');
    Route::resource('board', 'Admin\BoardController');
    Route::resource('resources', 'Admin\ResourceController');
    Route::resource('members', 'Admin\MembersController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('newsletters', 'Admin\NewsletterController');

    Route::group(['prefix' => 'conferences'], function() {
        Route::resource('registration', 'Admin\Conference\RegistrationController');
    });

    Route::group(['prefix' => 'redactor'], function () {
        Route::post('/images', 'RedactorController@uploadImage');
        Route::post('/files', 'RedactorController@uploadFile');
    });
    Route::get('/filemanager', 'Admin\FilemanagerController@index');
    Route::get('/imagemanager', 'Admin\FilemanagerController@images');
    // Asset Manager
    Route::get('/asset-manager', 'AssetManagerController@manage');
    Route::post('/server/{file}', 'AssetManagerController@file');
});
Auth::routes();

Route::get('/mail/conference', function () {
    $order = App\Order::find(5);

    return new App\Mail\ConferenceRegistration($order);
});


