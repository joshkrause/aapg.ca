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
Route::get('/pages/{slug}', 'PagesController@page');
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
Route::get('/conferences/archive', 'ConferenceController@archive');
Route::get('/alert', 'AlertController@index');
Route::post('/subscribe', 'SubscriberController@store');

Route::get('/conferences', 'ConferenceController@index')->name('conferences.home');
Route::get('/conferences/{conference}', 'ConferenceController@show')->name('conferences.show');
Route::post('/conferences', 'ConferenceController@Order');
Route::get('/conferences/affiliate', 'ConferenceController@affiliate')->name('conferences.affiliate');

Route::group(['prefix'=>'admin', 'middleware'=> ['auth', 'admin']], function() {
    Route::get('/', 'Admin\PagesController@dashboard');
    Route::resource('users', 'Admin\UserController');
    Route::resource('board', 'Admin\BoardController');
    Route::resource('resources', 'Admin\ResourceController');
    Route::resource('sponsors', 'Admin\SponsorController');
    Route::resource('members', 'Admin\MembersController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('newsletters', 'Admin\NewsletterController');
    Route::resource('nav-buttons', 'Admin\NavButtonController');
    Route::get('pages/{page}/builder', 'Admin\PageController@builder');
    Route::post('pages/{page}/builder', 'Admin\PageController@saveHtml');
    Route::resource('pages', 'Admin\PageController');
    Route::resource('questions', 'Admin\QuestionController');
    Route::resource('portal', 'Admin\PortalController');
    Route::post('/nav-reorder', 'Admin\NavButtonController@reorder');


    Route::get('conferences/{conference}/builder', 'Admin\Conference\ConferenceController@builder');
	Route::post('conferences/{conference}/builder', 'Admin\Conference\ConferenceController@saveHtml');
	Route::resource('conferences/{conference}/schedule', 'Admin\Conference\ConferenceScheduleController');
	Route::resource('conferences/{conference}/ticket-packages', 'Admin\Conference\ConferenceTicketPackageController');
	Route::resource('conferences', 'Admin\Conference\ConferenceController');
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
    Route::get('/asset-manager', 'Admin\AssetManagerController@manage');
    Route::post('/asset-manager/saveImages', 'Admin\AssetManagerController@saveImages');
    Route::post('/asset-manager/saveLargeImages', 'Admin\AssetManagerController@saveLargeImages');
    Route::post('/asset-manager/saveModuleImages', 'Admin\AssetManagerController@saveModuleImages');
    Route::post('/server/{file}', 'Admin\AssetManagerController@file');
});
Auth::routes();
Route::get('/logout', function() {
    Auth::logout(); return redirect('/');
});

Route::get('/mail/conference', function () {
    $order = App\Order::find(5);

    return new App\Mail\ConferenceRegistration($order);
});
