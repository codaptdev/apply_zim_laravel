<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationsDashboard;
use App\Http\Controllers\RedirectLogController;
use App\Http\Controllers\StudentsHomePageController;
use App\Http\Controllers\ApplicationAnswerController;
use App\Http\Controllers\SchoolGalleryItemController;
use App\Http\Controllers\ApplicationQuestionController;

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
Route::get('/home', [StudentsHomePageController::class, 'index'])
->middleware('auth', 'user_check:student');

// Guest Routes for unauthenticated users
Route::get('/guest', [GuestController::class, 'index']);
Route::get('/about', [GuestController::class, 'about']);
Route::get('/register', [GuestController::class, 'register']);

// Navigation
Route::get('/menu', [NavigationController::class, 'fullScreenMenu']);

// Auth Routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('/signout', [AuthController::class, 'signout']);
    Route::get('/signin', [AuthController::class,'index'])->name('login');
    Route::post('/signin', [AuthController::class,'signin']);
});

// Registration Routes
Route::group(['prefix' => 'register'], function() {
    Route::get('/student', [StudentController::class, 'create'] );
    Route::post('/student', [StudentController::class, 'store'] );
    Route::get('/school',  [SchoolController::class, 'create'] );
    Route::post('/school',  [SchoolController::class, 'store'] );
});

// My School Routes
Route::group(['prefix' => 'myschool', 'middleware' => ['auth', 'user_check:school']], function () {

    // Dashboard Routes
    Route::get('/',  [SchoolController::class, 'myschool'] );
    Route::get('/edit',  [SchoolController::class, 'edit'] );
    Route::post('/update',  [SchoolController::class, 'update'] );

    // Profile Routes
    Route::post('/profile/update', [ProfileController::class,'update'] );
    Route::get('/profile/edit', [ProfileController::class,'edit']);

    // Logo Routes
    Route::get('/logo/edit', [LogoController::class,'edit']);
    Route::post('/logo/update', [LogoController::class,'update']);

});

// Student Application Routes

Route::group(['prefix' => 'applications', 'middleware' => ['auth']], function () {


    Route::get('/', [ApplicationController::class, 'index']);
    Route::get('/apply', [ApplicationController::class, 'store'])->middleware('user_check:student');
    Route::get('/delete/{id}', [ApplicationController::class, 'destroy'])->middleware('user_check:student')->where('id', '[0-9]+');

    Route::get('/dashboard', [ApplicationsDashboard::class, 'index'])->middleware(['user_check:school']);;
    Route::get('/dashboard/history', [ApplicationsDashboard::class, 'history'])->middleware(['user_check:school']);

    // Routes for Creating application forms for schools
    Route::get('/dashboard/forms/create', [ApplicationQuestionController::class, 'create'])->middleware(['user_check:school']);;
    Route::post('/dashboard/forms/create', [ApplicationQuestionController::class, 'store'])->middleware(['user_check:school']);;

    // Routes for Editing application forms for schools
    Route::get('/dashboard/forms/edit', [ApplicationQuestionController::class, 'edit'])->middleware(['user_check:school']);;
    Route::post('/dashboard/forms/edit', [ApplicationQuestionController::class, 'store'])->middleware(['user_check:school']);

    // Routes for Responding to forms for students
    Route::get('/forms/respond', [ApplicationAnswerController::class, 'create'])->middleware(['user_check:student']);;
    Route::post('/forms/respond', [ApplicationAnswerController::class, 'store'])->middleware(['user_check:student']);;

});

// Get school with ID
Route::get('/schools/{id}',  [ProfileController::class, 'indexWithID'] )
->where('id', '^\d+$');

// Get school with name
Route::get('/schools/{name}',  [ProfileController::class, 'index']);

// Search Routes
Route::get('/search', [SchoolController::class, 'show'])->name('search');

// Student Bookmarks
Route::get('/bookmarks', [BookmarkController::class, 'index'])
->middleware('auth', 'user_check:student');

Route::get('/bookmarks/delete/{school_id}', [BookmarkController::class, 'destroy'])
->middleware('auth', 'user_check:student')
->where('school_id', '[0-9]+')
;

Route::get('/bookmarks/add/{school_id}', [BookmarkController::class, 'store'])
->middleware('auth', 'user_check:student')
->where('school_id', '[0-9]+')
;

// School Statistics Routes
Route::get('/statistics', [StatsController::class, 'index'])
->middleware('auth', 'user_check:school');

// School Statistics Routes for Cities Profile Visits Breakdown
Route::get('/statistics/profile_visits_by_cities', [StatsController::class, 'profileVisitsByCities'])
->middleware('auth', 'user_check:school');

// Example request could be /redirect?school_id=16&url=https://github.com/Tadiwr
// This url logs redirects from school profile pages
Route::get('/redirect', [RedirectLogController::class, 'index'] );

// Routes for School Galleries

Route::group(['prefix' => 'gallery'], function () {
    Route::get('/{school_id}', [SchoolGalleryItemController::class, 'index'])->where('school_id', '[0-9]+');
    Route::get('/edit', [SchoolGalleryItemController::class, 'edit'])->middleware(['auth', 'user_check:school']);
    Route::get('/create', [SchoolGalleryItemController::class, 'create'])->middleware(['auth', 'user_check:school']);;
    Route::post('/', [SchoolGalleryItemController::class, 'save'])->where('school_id', '[0-9]+')->middleware(['user_check:school', 'auth']);
    Route::get('/delete/{item_id}', [SchoolGalleryItemController::class, 'delete'])->middleware(['auth', 'user_check:school']);
});
