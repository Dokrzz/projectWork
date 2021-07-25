<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'signup'
    ]);
    return view('welcome');
});
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function() {
        return view('welcome');
    })->name("home");

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);

    Route::post('/upateaccount', [
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);

    Route::get('/userimage/{filename}', [
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create',
        'middleware' => 'auth'
    ]);

    Route::get('/event', [
        'uses' => 'EventController@getEvent',
        'as' => 'event'
    ]);

    Route::post('/createevent', [
        'uses' => 'EventController@postCreateEvent',
        'as' => 'event.create',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-event/{event_id}', [
        'uses' => 'EventController@getDeleteEvent',
        'as' => 'event.delete',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-post/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'auth'
    ]);

    Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit'
    ]);

    Route::post('/edit-event', [
        'uses' => 'EventController@postEditEvent',
        'as' => 'edit-event'
    ]);

    Route::post('/like', [
        'uses' => 'PostController@postLikePost',
        'as' => 'like'
    ]);

    Route::get('/search', [
        'uses' => 'SearchController@search',
        'as' => 'search'
    ]);

    Route::get('/show/{$posts}', [
        'uses' => 'PostController@show',
        'as' => "show"
    ]);

});
