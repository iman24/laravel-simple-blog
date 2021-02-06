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

// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

// use Spatie\Permission\Models\Role;

// Route::get('/', function(){
//     $user = Role::find(2);
//     $user->givePermissionTo('manage post');
//     return dd($user);
// });



use Illuminate\Http\Request;

// Route::get('/x', function(Request $req){
//     dump(json_decode($req->get('a'),true));
//     // return response()->json($req->all());
// });

Auth::routes();
Route::get('/home','HomeController@index');

Route::get('/', 'FrontController@index');
Route::get('/read/{slug}', 'FrontController@read')
        ->where('slug','[a-zA-Z\-]+');

Route::prefix('/post')->group(function(){
    Route::get('/', 'PostController@index');
    Route::get('/create', 'PostController@create');
    Route::post('/store', 'PostController@store');
    Route::get('/edit/{id}', 'PostController@edit')
        ->where('id', '[0-9]+');
    Route::post('/update/{id}', 'PostController@update')
        ->where('id', '[0-9]+');
    Route::get('/destroy/{id}', 'PostController@destroy');
});

Route::prefix('/category')->group(function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/create', 'CategoryController@create');
    Route::post('/store', 'CategoryController@store');
    Route::get('/show/{id}', 'CategoryController@show');
    Route::get('/edit/{id}', 'CategoryController@edit')
        ->where('id', '[0-9]+');
    Route::post('/update/{id}', 'CategoryController@update')
        ->where('id', '[0-9]+');
    Route::get('/destroy/{id}', 'CategoryController@destroy');
});

Route::prefix('/comment')->group(function () {
    Route::get('/', 'CommentController@index');
    Route::post('/store/{id}', 'CommentController@store');
    Route::get('/edit/{id}', 'CommentController@edit');
    Route::get('/destroy/{id}', 'CommentController@destroy');
});

Route::prefix('/user')->group(function () {
    Route::get('/', 'UserController@index');
    Route::post('/store/{id}', 'UserController@role');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::get('/destroy/{id}', 'CommentController@destroy');
});


