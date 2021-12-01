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
|https://www.youtube.com/watch?v=Fz0pTzHptGE&list=PL_99hMDlL4d3-n63bsNaaDRnTZdCOvU6q&index=1
https://www.fundaofwebit.com/laravel-5-8/how-to-make-user-and-admin-login-system-in-laravel
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

});
