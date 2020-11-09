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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{name}', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.user');

Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

Route::get('/news/{category_slug?}', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::get('/news/{category_slug}/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');