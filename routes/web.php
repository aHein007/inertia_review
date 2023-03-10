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




Route::controller(UserIndexController::class)->group(function(){
    Route::get("/index",'index')->name("user#index");
    Route::get("/createPage",'create')->name("user#createPage");
    Route::post("/create",'store')->name("user#create");
    Route::get("/editPage/{id}",'edit')->name("user#editPage");
    Route::put("/edit/{id}","update")->name("user#update");
    Route::delete("/delete/{id}","destroy")->name("user#delete");

});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile',  'edit')->name('profile.edit');
    Route::patch('/profile',  'update')->name('profile.update');
    Route::delete('/profile',  'destroy')->name('profile.destroy');
})->middleware('auth');

require __DIR__.'/auth.php';
