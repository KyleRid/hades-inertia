<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailCampaignController;
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/about', function () {
//     return Inertia::render('About', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/contact', function () {
//     return Inertia::render('Contact', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/', function() {
    return redirect('/dashboard');
});

// Users
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/users', [UsersController::class, 'index'])
    ->name('users.index');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/users/create', [UsersController::class, 'create'])
    ->name('users.create');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/users', [UsersController::class, 'store'])
    ->name('users.store');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/users/{user}', [UsersController::class, 'show'])
    ->name('users.info');

Route::middleware(['auth:sanctum', 'verified'])
    ->patch('/users/{user}', [UsersController::class, 'update'])
    ->name('users.update');

Route::middleware(['auth:sanctum', 'verified'])
    ->delete('/users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy');

//Roles
Route::middleware(['auth:sanctum', 'verified'])->get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/roles/{user}/edit', [RolesController::class, 'edit'])->name('roles.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('/roles/{user}', [RolesController::class, 'update'])->name('roles.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/roles/{user}', [RolesController::class, 'destroy'])->name('roles.destroy');

//Configuration
Route::middleware(['auth:sanctum', 'verified'])->get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
// Route::middleware(['auth:sanctum', 'verified'])->get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
// Route::middleware(['auth:sanctum', 'verified'])->post('/roles', [RolesController::class, 'store'])->name('roles.store');
// Route::middleware(['auth:sanctum', 'verified'])->get('/roles/{user}/edit', [RolesController::class, 'edit'])->name('roles.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('/configuration', [ConfigurationController::class, 'update'])->name('configuration.update');
// Route::middleware(['auth:sanctum', 'verified'])->delete('/roles/{user}', [RolesController::class, 'destroy'])->name('roles.destroy');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/emailCampaign', [EmailCampaignController::class, 'index'])->name('emailCampaign.index');

    Route::patch('/emailCampaign', [EmailCampaignController::class, 'update']);
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])
    ->name('posts.edit');
    Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.delete');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
