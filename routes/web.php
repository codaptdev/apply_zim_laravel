<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('about.index');
});

Route::get('/register', function() {
    return view('auth.register');
} );
Route::get('/register/student', 'AuthController@create' );
Route::get('/register/school', 'AuthController@create' );
