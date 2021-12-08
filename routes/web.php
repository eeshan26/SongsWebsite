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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',function(){
    return view('dashboard');
});
Route::get('/login','loginController@displayform');

Route::get('/displayReport','reportController@displayform');

Route::post('/User_report_email','reportController@check');

Route::get('/register','loginController@displayregistrationform');

Route::post('/register_submit','loginController@checkregister');

Route::post('/signin','loginController@check');

Route::get('/logout','loginController@logout');

Route::get('/displaySongsData','songsController@viewdata');

Route::get('/displaySongsData','songsController@index');

Route::get('/click_song_edit/{SongId}','songsController@edit_function');

Route::get('/click_song_delete/{SongId}','songsController@delete_function');

Route::get('/click_mark_favourite/{SongId}','songsController@markAsFavourite_function');

Route::post('/update_song_data/{SongId}','songsController@update_function');

Route::get('/favouriteSongs','favouriteSongsController@viewdata');

Route::get('/favouriteSongs','favouriteSongsController@index');

Route::get('/click_favouriteSong_delete/{UId}/{SongId}','favouriteSongsController@delete');

Route::get('/displayFriendsData','friendsController@viewdata');

Route::get('/displayFriendsData','friendsController@index');

Route::get('/click_user_edit/{UId}','friendsController@edit_function');

Route::post('/update_user_data/{UId}','friendsController@updateUser_function');

Route::get('/click_user_delete/{UId}','friendsController@deleteUsers_function');

Route::get('/click_user_add/{UId}','friendsController@addFriend_function');

Route::get('/click_friends_delete/{UId1}/{UId2}','friendsController@delete');

Route::get('/click_friends_message/{UId1}/{UId2}','friendsController@message');

Route::get('/click_message_delete/{date_time}','friendsController@delete_message');

Route::get('/write_message','friendsController@write_message');

Route::post('/sendMessage','friendsController@send_message');

Route::get('/allUsers','friendsController@Usersviewdata');

Route::get('/allUsers','friendsController@Usersindex');

Route::get('/displayGroupsData','groupsController@viewdata');

Route::get('/displayGroupsData','groupsController@index');

Route::get('/click_group_delete/{UId}/{GId}','groupsController@delete');

Route::get('/addGroup','groupsController@viewAllGroupsdata');

Route::get('/addGroup','groupsController@allGroupIndex');

Route::get('/click_group_permanentDelete/{GId}','groupsController@allGroupsdelete');

Route::get('/click_group_join/{GId}','groupsController@Groupjoin');

Route::get('/click_group_edit/{GId}','groupsController@Groupedit');

Route::get('/click_group_Message/{UId}/{GId}','groupsController@Group_message');

Route::get('/write_group_message','groupsController@write_message');

Route::post('/sendGroupMessage','groupsController@send_message');

Route::post('/update_group_data/{GId}','groupsController@update_function');

// Route::get('/displayview1','viewsController@view1');

// Route::get('/displayview2','viewsController@view2');

// Route::get('/displayview3','viewsController@view3');

// Route::get('/displayview4','viewsController@view4');

// Route::get('/displayview5','viewsController@view5');

// Route::get('/displayview6','viewsController@view6');



