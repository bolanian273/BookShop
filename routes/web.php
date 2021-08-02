<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Doctrine\DBAL\Schema\Index;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', function () {
    return view('welcome');
});
//     return '<h1>Hello World<>';
// });
// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return "this is user $id with the name $name";
// });


// Route::get('/about', function () {
//     return view('pages.about');
// });
// Route::get('/about', function () {
//     return view('pages.about');
// });

// Route::get('/', [PagesController::class, 'index'] );
// Route::get('/about',[PagesController::class ,'about']);
// Route::get('/services', [PagesController::class, 'services']);
// Route::resource('posts', PostsController::class);
Route::get('/', 'PagesController@index' );
Route::get('/about','PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts','PostsController');

Auth::routes();

// Route::get('/dashboard', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController');
