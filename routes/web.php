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

Route::get('/', 'PageController@home');
Route::get('/home', ['as' => 'home', 'uses' => 'PageController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PageController@saludos'])->where('nombre', "[A-Za-z]+");

// Route::get('messages', ['as' => 'messages.index', 'uses' => 'MessegesController@index']);
// Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessegesController@create']);
// Route::get('messages/{id}', ['as'=> 'messages.show', 'uses'=> 'MessegesController@show']);
// Route::post('messages', ['as'=>'messages.store', 'uses'=>'MessegesController@store']);
// Route::get('messages/{id}/edit', ['as'=> 'messages.edit', 'uses'=> 'MessegesController@edit']);
// Route::put('messages/{id}', ['as'=>'messages.update', 'uses'=>'MessegesController@update']);
// Route::delete('messages/{id}', ['as'=>'messages.destroy', 'uses'=>'MessegesController@destroy']);
Route::resource('messages', 'MessegesController');

Route::resource('usuarios', 'UsersController');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('role', function () {
    return App\Role::with('user')->get();
});

// Route::get('/test', function () {
//     $user = new App\User;
//     $user->name = "Yadira Angelica";
//     $user->email = "yaverdecia@gmail.com";
//     $user->password = bcrypt('1');
//     $user->role_id = 3;
//     $user->save();
// });

// Route::get('/roles', function () {
//     $user = new App\Role;
//     $user->name = "moderator";
//     $user->display_name = "Moderador del sistema";
//     $user->save();
// });