<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsersController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/users', [UsersController::class, 'index'])->name('users.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/users', [UsersController::class, 'store'])->name('users.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
