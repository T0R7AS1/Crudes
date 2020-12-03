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
Route::get('/public/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('companies', 'App\Http\Controllers\CompaniesController')->middleware('auth');

Route::resource('employes', 'App\Http\Controllers\EmployesController')->middleware('auth');