<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\AdminDashboardHomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\User\UserDashboardHomeController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\UserProfileController;


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


// Route untuk tampilan login

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']); // Method 'login' akan dipanggil untuk autentikasi
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Method 'logout' akan dipanggil untuk proses logout


Route::get('/', function () {
    return view('auth.login');
})->name('auth.login');

Route::group([
    "prefix" => "dashboard",
    "as" => "dashboard."
], function() {
    /*
    |--------------------------------------------------------------------------
    | User Page Route
    |--------------------------------------------------------------------------
    | Route yang bisa diakses oleh semua user
    */
    Route::get("/", DashboardHomeController::class)->name('home');
    Route::get('/checkin', [CheckInController::class, 'index'])->name('checkin.index'); // Menampilkan halaman check-in
    Route::post('/checkin/store', [CheckInController::class, 'store'])->name('checkin.store'); // Menyimpan data check-in
    Route::get("/settings", [UsersController::class, 'viewSetting'])->name('settings.index');
    Route::get("/people", [PeopleController::class, 'index'])->name('people');
    Route::get("/activity", [ActivityController::class, 'index'])->name('activity');
    Route::get("/user_profiles", [UserProfileController::class, 'index'])->name('user_profiles.index');
    Route::post("/user_profiles/update", [UserProfileController::class, 'update'])->name('user_profiles.update');
    Route::post('/user_profiles/upload-photo', [UserProfileController::class, 'uploadPhoto'])->name('user_profiles.upload-photo');



    /*
    |--------------------------------------------------------------------------
    | Admin Page Route
    |--------------------------------------------------------------------------
    | Route yang hanya bisa diakses oleh admin
    | TODO: menambahkan middleware untuk admin
    */

    // Menu User
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/report', [ReportController::class, 'index'])->name('report');
// Circle Routes
Route::post('/add-circle', [UsersController::class, 'store'])->name('add.circle');
Route::get('/circle/edit/{id}', [UsersController::class, 'edit'])->name('edit.circle');
Route::put('/circle/update/{id}', [UsersController::class, 'update'])->name('update.circle');
Route::delete('/circle/delete/{id}', [UsersController::class, 'destroy'])->name('delete.circle');
// Role Routes
Route::post('/add-role', [UsersController::class, 'getRoles'])->name('add.role');
Route::get('/role/edit/{id}', [UsersController::class, 'editRole'])->name('edit.role');
Route::put('/role/update/{id}', [UsersController::class, 'updateRole'])->name('update.role');
Route::delete('/role/delete/{id}', [UsersController::class, 'destroyRole'])->name('delete.role');
// User Routes
Route::post('/add-user', [UsersController::class, 'addUser'])->name('add.user');
Route::get('/user/edit/{id}', [UsersController::class, 'editUser'])->name('edit.user');
Route::put('/user/update/{id}', [UsersController::class, 'updateUser'])->name('update.user');
Route::delete('/user/delete/{id}', [UsersController::class, 'destroyUser'])->name('delete.user');


    Route::get("/users", [UsersController::class, 'index'])->name('users');
    Route::get("/report", [ReportController::class, 'index'])->name('report');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('edit.circle');
    Route::put('/users/edit/{id}', [UsersController::class, 'update'])->name('update.circle');
    Route::post('/add-circle', [UsersController::class, 'store'])->name('add.circle');
    Route::delete('/delete-circle/{id}', [UsersController::class, 'destroy'])->name('delete.circle');
    Route::post('/add-role', [UsersController::class, 'getRoles'])->name('add.role');
    Route::get('/role/edit/{id}', [UsersController::class, 'editRole'])->name('edit.role');
    Route::put('/role/edit/{id}', [UsersController::class, 'updateRole'])->name('update.role');
    Route::delete('/delete-role/{id}', [UsersController::class, 'destroyRole'])->name('delete.role');

    Route::post('/activity/add', [ActivityController::class, 'addActivity'])->name('activity.add');
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
    Route::post('/activity/add', [ActivityController::class, 'addActivity'])->name('activity.add');
    Route::get('/activity/edit/{id}', [ActivityController::class, 'editActivity'])->name('activity.edit');
    Route::post('/activity/update/{id}', [ActivityController::class, 'updateActivity'])->name('activity.update');
    Route::delete('/activity/delete/{id}', [ActivityController::class, 'deleteActivity'])->name('activity.delete');
    Route::post('/additional-activity/add', [ActivityController::class, 'addAdditionalActivity'])->name('dashboard.additional-activity.add');


    Route::post('people', [PeopleController::class, 'store'])->name('people.store');
    Route::delete('people/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
    Route::get('people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
    Route::put('people/update/{id}', [PeopleController::class, 'update'])->name('people.update');
    Route::get('people/detail/{id}', [PeopleController::class, 'show'])->name('people.show');

    Route::get("/user_profiles", [UserProfileController::class, 'index'])->name('user_profiles.index');
    Route::post("/user_profiles/update", [UserProfileController::class, 'update'])->name('user_profiles.update');
    Route::post('/user_profiles/upload-photo', [UserProfileController::class, 'uploadPhoto'])->name('user_profiles.upload-photo');


});
