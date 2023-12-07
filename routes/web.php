<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
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

Route::get('/home', function () {
    if(auth()->user()->user_type == 'STUDENT') {
        return view('students.home');
    } else {
        return view('schools.home');
    }
})->middleware('auth');


// Auth Routes
Route::get('auth/signout', [AuthController::class, 'signout']);
Route::get('auth/signin', [AuthController::class,'index'])->name('login');
Route::post('auth/signin', [AuthController::class,'signin']);

Route::get('/register', function() {
    return view('auth.register');
});

// Students' Routes
Route::get('/register/student', [StudentController::class, 'create'] );
Route::post('/register/student', [StudentController::class, 'store'] );

// Schools' Routes
Route::get('/register/school',  [SchoolController::class, 'create'] );
Route::post('/register/school',  [SchoolController::class, 'store'] );

// My School Routes
Route::get('/myschool',  [SchoolController::class, 'myschool'] )->middleware('auth');
Route::get('/myschool/edit',  [SchoolController::class, 'edit'] )->middleware('auth');
Route::post('/myschool/update',  [SchoolController::class, 'update'] )->middleware('auth');
Route::get('/schools/{name}',  [SchoolController::class, 'index'] );


// Search Routes
Route::get('/search', [SchoolController::class, 'show'])->name('search');
