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
// Home
Route::get('/', 'WelcomeController@show')->name('welcome_page');


//Route::get('/', 'Auth\LoginController@home');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Feed
Route::get('feed', 'FeedController@index')->name('feed');

//Publication
Route::get('publication/{id}', 'PublicationController@show');
Route::get('publications', 'PublicationController@getPublications');
Route::post('createPublication','PublicationController@addPublication');
Route::get('deletePublication/{id}','PublicationController@delete');
Route::post('updatePublication/{id}','PublicationController@update');
Route::post('group/createPublication/{id}','PublicationController@addPublication');


// API Publications
Route::put('api/publication', 'PublicationController@create');
Route::delete('api/publications/{publication_id}', 'PublicationController@delete');
Route::put('api/publications/{publication_id}/', 'PublicationController@create');

//Groups
Route::get('groups', 'GroupController@getGroups')->name('groups');
Route::post('createGroup', 'GroupController@create');
Route::get('group/{id}', 'GroupController@show')->name('group');
Route::get('group/members/{id}', 'GroupController@getMembers')->name('members');
Route::get('removeMember/{group_id}/{user_id}','GroupController@remove');

Route::get('groupSearch/{group_id}', 'GroupController@search')->name('groupSearch');
Route::get('addMember/{group_id}/{user_id}','GroupController@addMember')->name('addMember');


//Route::post('createPublication','PublicationController@addPublication');

//Message
Route::get('messages','MessageController@getMessages')->name('messages');
Route::get('get_userMessages{id}','MessageController@get_userMessages')->name('messages');
Route::post('messages','MessageController@addMessage');

//Profile
Route::get('profile','ProfileController@getProfile')->name('profile');
Route::get('get_profile{id}','ProfileController@get_profile')->name('profile');

//Public
Route::get('/about_us', 'AboutUsController@show')->name('about_us');
Route::get('/faq', 'FaqController@show')->name('faq');

//Search
Route::get('searchs', 'SearchController@search')->name('searchs');

//Friends
Route::get('friends', 'FriendController@getFriends')->name('friends');
Route::get('addfriend{id}','FriendController@addFriend');
Route::get('deletefriend{id}','FriendController@deleteFriend');

//Like
Route::post('api/publication/{publication_id}/like', 'LikeController@create');

//Comment
Route::post('/api/publication/{id}/comment', 'CommentController@create')->name('add_comment');
Route::delete('deleteComment/{id}', 'CommentController@delete')->name('deleteComment');
Route::post('updateComment//{id}', 'CommentController@update')->name('updateComment');

