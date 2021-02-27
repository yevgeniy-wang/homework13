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

Route::get('/', [\App\Http\Controllers\Controller::class, 'posts']);
Route::get('/author/{id}', [\App\Http\Controllers\Controller::class, 'author']);

Route::get('/category/{id}', [\App\Http\Controllers\Controller::class, 'category']);

Route::get('/tag/{id}', [\App\Http\Controllers\Controller::class, 'tag']);

Route::get('/filterAC', [\App\Http\Controllers\Controller::class, 'filterAC']);
Route::post('/filterAC', [\App\Http\Controllers\Controller::class, 'validationAC']);

Route::get('/filterACT', [\App\Http\Controllers\Controller::class, 'filterACT']);
Route::post('/filterACT', [\App\Http\Controllers\Controller::class, 'validationACT']);

Route::get('/author/{author}/category/{category}', [\App\Http\Controllers\Controller::class, 'postsAC']);
Route::get('/author/{author}/category/{category}/tag/{tag}', [\App\Http\Controllers\Controller::class, 'postsACT']);



