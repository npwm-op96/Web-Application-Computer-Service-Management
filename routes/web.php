<?php

use App\Events\WebsocketDemoEvent;
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
    broadcast(new WebsocketDemoEvent('some data'));

    return view('/');
});

//Messages
Route::get('/chats', 'ChatsController@index');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//for user
Route::resource ( '/showticket', 'TicketController' );


//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});


//Route Store
Route::resource('stores', 'StoresController');
Route::post('stores/update', 'StoresController@update')->name('stores.update');
Route::get('stores/destroy/{id}', 'StoresController@destroy');
//Number
Route::resource('number', 'NumberController');
Route::post('number/update', 'NumberController@update')->name('number.update');
Route::get('number/destroy/{id}', 'NumberController@destroy');
//Problem

Route::resource('problem', 'ProblemController');
Route::post('problem/update', 'ProblemController@update')->name('problem.update');
Route::get('problem/destroy/{id}', 'ProblemController@destroy');

//Department
Route::resource('department', 'DepartmentController');
Route::post('department/update', 'DepartmentController@update')->name('department.update');
Route::get('department/destroy/{id}', 'DepartmentController@destroy');

//Content 
Route::get('/post_public', 'ContentPublicController@index')->name('post_public');


Route::get('/home', 'HomeController@index')->name('home');

//Route employee

Route::resource('employee', 'EmpController');
Route::post('employee/update', 'EmpController@update')->name('employee.update');
Route::get('employee/destroy/{id}', 'EmpController@destroy');
//Route Members
Route::resource('member', 'UserController@profile');
Route::resource('member', 'UserController');
Route::post('member/update', 'UserController@update')->name('member.update');
Route::get('member/destroy/{id}', 'UserController@destroy');

//Route Ticket
Route::get('ticket', 'TicketController@myPosts');
Route::resource('posts','TicketController');

Route::resource('profile','ProfileController');


//Export
Route::resource('export','ExportExcelController');

//Chat
Route::get('chats', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

//Chart
Route::get('chart', 'ChartController@index');
//Notification
Route::get('/postmessages', 'NotificationController@index');
Route::get('/notification', 'NotificationController@sendNotification');
