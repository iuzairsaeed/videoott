<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;

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
Route::group(['prefix'=>'/admin'] , function($route){

$route->get('/',[AdminController::class ,'index'])->name('dashboard');

});

Route::get('/',[HomeController::class ,'Index'])->name('index');
Route::get('/about',[HomeController::class ,'About'])->name('about');
Route::get('/contact',[HomeController::class ,'Contact'])->name('contact');
