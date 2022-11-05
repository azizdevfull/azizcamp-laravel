<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;

use App\Http\Middleware\AdminMiddleware;
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
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

});

Route::group(['middleware' => 'auth'], function(){

   
    Route::resource('projects', ProjectsController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    
    })->name('dashboard');
    
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
