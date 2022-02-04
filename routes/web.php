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
Auth::routes();

Route::get('/', [\App\Http\Controllers\NewsController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'account'], function () {
       Route::get('/', [\App\Http\Controllers\Account\IndexController::class, 'index'])->name('account.index');
    });
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
        Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('/categories', \App\Http\Controllers\Admin\CategoriesController::class);
        Route::resource('/users',\App\Http\Controllers\Admin\UsersController::class);
    });
});

Route::get('/welcome/{name}', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.user');

Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

Route::get('/categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/contact-us', \App\Http\Controllers\FeedbackController::class);

Route::resource('/parser', \App\Http\Controllers\ParserController::class);

