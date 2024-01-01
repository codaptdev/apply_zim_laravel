<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthUserHomePageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
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

// Index Route
Route::get('/', [IndexController::class, 'index'])->name('index');

// Home page for authenticated users
Route::get('/home', [AuthUserHomePageController::class, 'index'])
->middleware('auth')
->name('auth-home');

// Guest Routes for unauthenticated users
Route::get('/guest', [GuestController::class, 'index']);
Route::get('/about', [GuestController::class, 'about']);
Route::get('/register', [GuestController::class, 'register']);


// Navigation
Route::get('/menu', [NavigationController::class, 'fullScreenMenu']);

// Auth Routes
Route::get('auth/signout', [AuthController::class, 'signout']);
Route::get('auth/signin', [AuthController::class,'index'])->name('login');
Route::post('auth/signin', [AuthController::class,'signin']);
Route::get('/register', [AuthController::class,'registrationOptions']);

// Student Registration Routes
Route::get('/register/student', [StudentController::class, 'create'] );
Route::post('/register/student', [StudentController::class, 'store'] );

// School Registration Routes
Route::get('/register/school',  [SchoolController::class, 'create'] );
Route::post('/register/school',  [SchoolController::class, 'store'] );

// My School Routes
Route::get('/myschool',  [SchoolController::class, 'myschool'] )->middleware('auth');
Route::get('/myschool/edit',  [SchoolController::class, 'edit'] )->middleware('auth');
Route::post('/myschool/update',  [SchoolController::class, 'update'] )->middleware('auth');

// Myschool Profile Routes
Route::post('/myschool/profile/update', [ProfileController::class,'update'] )->middleware('auth');
Route::get('/myschool/profile/edit', [ProfileController::class,'edit'])->middleware('auth');

// My School Logo Routes
Route::get('/myschool/logo/edit', [LogoController::class,'edit'])->middleware('auth');
Route::post('/myschool/logo/update', [LogoController::class,'update'])->middleware('auth');

// Student Application Routes
Route::get('/apply', [ApplicationController::class, 'store'])->middleware('auth');
Route::get('/applications', [ApplicationController::class, 'index'])->middleware('auth');
Route::get('/applications/delete/{id}', [ApplicationController::class, 'destroy'])
->middleware('auth')
->where('id', '[0-9]+');

// Get school with ID
Route::get('/schools/{id}',  [SchoolController::class, 'indexWithID'] )
->where('id', '[1-9]+');

// Get school with name
Route::get('/schools/{name}',  [SchoolController::class, 'index']);

// Search Routes
Route::get('/search', [SchoolController::class, 'show'])->name('search');
