<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryCourseController;
// use App\Http\Controllers\JabatansController;
// use App\Http\Controllers\KaryawansController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\CourseSectionPartController;
use App\Http\Controllers\CourseSectionQnaController;
use App\Http\Controllers\DashboardController;
// use App\Http\Middleware\AdminMiddleware;

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
    // return view('welcome');
    if (Auth::check()) {
        if (Auth::user()->role == 'admin')
            return Redirect::route('admin.dashboard');
        else
            return Redirect::route('dashboard');
    } else {
        return Redirect::route('login');
    }
});

// Route::get("/crud", [KaryawansController::class, "index"]);
// Route::get("/crud/search", [KaryawansController::class, "search"])->name("karyawans.search");

// Route::resource("jabatans", JabatansController::class);
// Route::resource("karyawans", KaryawansController::class);

// login register
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'store'])->name('register.store');


// Route::get('/register', 'AuthController@register')->name('register');
// Route::post('/register', 'AuthController@store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);


// Route::get('/login', 'AuthController@login')->name('login');
// Route::post('/login', 'AuthController@authenticate');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::post('/logout', 'AuthController@logout')->name('logout');


// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::resource('courses', 'Admin\CourseController');
// });


// Route::resource('users', UserController::class);
// Route::resource('courses', CourseController::class);
// Route::resource('course-sections', CourseSectionController::class);
// Route::resource('course-section-parts', CourseSectionPartController::class);
// Route::resource('course-section-qnas', CourseSectionQnaController::class);

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('users', UserController::class);
//     Route::resource('courses', CourseController::class);
//     Route::resource('course-sections', CourseSectionController::class);
//     Route::resource('course-section-parts', CourseSectionPartController::class);
//     Route::resource('course-section-qnas', CourseSectionQnaController::class);
// });


// Route::middleware([AdminMiddleware::class])->group(function () {
//     Route::resource('users', UserController::class);
//     Route::resource('courses', CourseController::class);
//     Route::resource('course-sections', CourseSectionController::class);
//     Route::resource('course-section-parts', CourseSectionPartController::class);
//     Route::resource('course-section-qnas', CourseSectionQnaController::class);
// });


Route::middleware(['auth'])->group(function () {

    // Protected dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // // Other admin-only routes

    // // Users Management Routes
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // // Categories Management Routes
    // Route::get('/categories', [CategoryCourseController::class, 'index'])->name('categories.index');
    // Route::get('/categories/create', [CategoryCourseController::class, 'create'])->name('categories.create');
    // Route::post('/categories', [CategoryCourseController::class, 'store'])->name('categories.store');
    // Route::get('/categories/{category}', [CategoryCourseController::class, 'show'])->name('categories.show');
    // Route::get('/categories/{category}/edit', [CategoryCourseController::class, 'edit'])->name('categories.edit');
    // Route::put('/categories/{category}', [CategoryCourseController::class, 'update'])->name('categories.update');
    // Route::delete('/categories/{category}', [CategoryCourseController::class, 'destroy'])->name('categories.destroy');


    // // Courses Management Routes
    // Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    // Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    // Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    // Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    // Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    // Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    // Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');


    // // Course Sections Management Routes
    // Route::get('/course-sections', [CourseSectionController::class, 'index'])->name('course-sections.index');
    // Route::get('/course-sections/create', [CourseSectionController::class, 'create'])->name('course-sections.create');
    // Route::post('/course-sections', [CourseSectionController::class, 'store'])->name('course-sections.store');
    // Route::get('/course-sections/{courseSection}', [CourseSectionController::class, 'show'])->name('course-sections.show');
    // Route::get('/course-sections/{courseSection}/edit', [CourseSectionController::class, 'edit'])->name('course-sections.edit');
    // Route::put('/course-sections/{courseSection}', [CourseSectionController::class, 'update'])->name('course-sections.update');
    // Route::delete('/course-sections/{courseSection}', [CourseSectionController::class, 'destroy'])->name('course-sections.destroy');


    // // Course Section Parts Management Routes
    // Route::get('/course-section-parts', [CourseSectionPartController::class, 'index'])->name('course-section-parts.index');
    // Route::get('/course-section-parts/create', [CourseSectionPartController::class, 'create'])->name('course-section-parts.create');
    // Route::post('/course-section-parts', [CourseSectionPartController::class, 'store'])->name('course-section-parts.store');
    // Route::get('/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'show'])->name('course-section-parts.show');
    // Route::get('/course-section-parts/{courseSectionPart}/edit', [CourseSectionPartController::class, 'edit'])->name('course-section-parts.edit');
    // Route::put('/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'update'])->name('course-section-parts.update');
    // Route::delete('/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'destroy'])->name('course-section-parts.destroy');

    // //  Course Section Qnas Management Routes
    // Route::get('/course-section-qnas', [CourseSectionQnaController::class, 'index'])->name('course-section-qnas.index');
    // Route::get('/course-section-qnas/create', [CourseSectionQnaController::class, 'create'])->name('course-section-qnas.create');
    // Route::post('/course-section-qnas', [CourseSectionQnaController::class, 'store'])->name('course-section-qnas.store');
    // Route::get('/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'show'])->name('course-section-qnas.show');
    // Route::get('/course-section-qnas/{courseSectionQna}/edit', [CourseSectionQnaController::class, 'edit'])->name('course-section-qnas.edit');
    // Route::put('/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'update'])->name('course-section-qnas.update');
    // Route::delete('/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'destroy'])->name('course-section-qnas.destroy');

    // Users Management Routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Categories Management Routes
    Route::get('/admin/categories', [CategoryCourseController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryCourseController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryCourseController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}', [CategoryCourseController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/{category}/edit', [CategoryCourseController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryCourseController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryCourseController::class, 'destroy'])->name('admin.categories.destroy');


    // Courses Management Routes
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin/courses/{course}', [CourseController::class, 'show'])->name('admin.courses.show');
    Route::get('/admin/courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin/courses/{course}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin/courses/{course}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');


    // Course Sections Management Routes
    Route::get('/admin/course-sections', [CourseSectionController::class, 'index'])->name('admin.course-sections.index');
    Route::get('/admin/course-sections/create', [CourseSectionController::class, 'create'])->name('admin.course-sections.create');
    Route::post('/admin/course-sections', [CourseSectionController::class, 'store'])->name('admin.course-sections.store');
    Route::get('/admin/course-sections/{courseSection}', [CourseSectionController::class, 'show'])->name('admin.course-sections.show');
    Route::get('/admin/course-sections/{courseSection}/edit', [CourseSectionController::class, 'edit'])->name('admin.course-sections.edit');
    Route::put('/admin/course-sections/{courseSection}', [CourseSectionController::class, 'update'])->name('admin.course-sections.update');
    Route::delete('/admin/course-sections/{courseSection}', [CourseSectionController::class, 'destroy'])->name('admin.course-sections.destroy');


    // Course Section Parts Management Routes
    Route::get('/admin/course-section-parts', [CourseSectionPartController::class, 'index'])->name('admin.course-section-parts.index');
    Route::get('/admin/course-section-parts/create', [CourseSectionPartController::class, 'create'])->name('admin.course-section-parts.create');
    Route::post('/admin/course-section-parts', [CourseSectionPartController::class, 'store'])->name('admin.course-section-parts.store');
    Route::get('/admin/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'show'])->name('admin.course-section-parts.show');
    Route::get('/admin/course-section-parts/{courseSectionPart}/edit', [CourseSectionPartController::class, 'edit'])->name('admin.course-section-parts.edit');
    Route::put('/admin/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'update'])->name('admin.course-section-parts.update');
    Route::delete('/admin/course-section-parts/{courseSectionPart}', [CourseSectionPartController::class, 'destroy'])->name('admin.course-section-parts.destroy');

    //  Course Section Qnas Management Routes
    Route::get('/admin/course-section-qnas', [CourseSectionQnaController::class, 'index'])->name('admin.course-section-qnas.index');
    Route::get('/admin/course-section-qnas/create', [CourseSectionQnaController::class, 'create'])->name('admin.course-section-qnas.create');
    Route::post('/admin/course-section-qnas', [CourseSectionQnaController::class, 'store'])->name('admin.course-section-qnas.store');
    Route::get('/admin/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'show'])->name('admin.course-section-qnas.show');
    Route::get('/admin/course-section-qnas/{courseSectionQna}/edit', [CourseSectionQnaController::class, 'edit'])->name('admin.course-section-qnas.edit');
    Route::put('/admin/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'update'])->name('admin.course-section-qnas.update');
    Route::delete('/admin/course-section-qnas/{courseSectionQna}', [CourseSectionQnaController::class, 'destroy'])->name('admin.course-section-qnas.destroy');


    // Route::resource('users', UserController::class);
    // Route::resource('categories', CategoryCourseController::class);
    // Route::resource('courses', CourseController::class);
    // Route::resource('course-sections', CourseSectionController::class);
    // Route::resource('course-section-parts', CourseSectionPartController::class);
    // Route::resource('course-section-qnas', CourseSectionQnaController::class);
});


// Route::middleware("admin")->group(function () {
  
//     Route::resource('users', UserController::class);
//     Route::resource('categories', CategoryCourseController::class);
//     Route::resource('courses', CourseController::class);
//     Route::resource('course-sections', CourseSectionController::class);
//     Route::resource('course-section-parts', CourseSectionPartController::class);
//     Route::resource('course-section-qnas', CourseSectionQnaController::class);
// });
