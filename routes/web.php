<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserIndexController;
use App\Models\UserIndex;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get("/index",[UserIndexController::class,'index'])->name("user#index");
Route::get("/createPage",[UserIndexController::class,'create'])->name("user#createPage");
Route::post("/create",[UserIndexController::class,'store'])->name("user#create");
Route::get("/editPage/{id}",[UserIndexController::class,'edit'])->name("user#editPage");
Route::get("/edit/{id}",[UserIndexController::class,"update"])->name("user#update");


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
