<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AttachersController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\TasksController;
use App\Models\project;

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


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

});

Route::group(['middleware' => 'auth'], function(){

    
Route::get('/', function () {
    $projects = Auth::user()->projects;
    return view('projects.index', compact('projects'));

});

   
    Route::resource('projects', ProjectsController::class);
    Route::resource('discussions', DiscussionsController::class);

    // Comment System
    Route::post('comments', [CommentsController::class,'store'] );
    Route::post('delete-comment', [CommentsController::class,'destroy'] );
    Route::get('comment/{id}/edit', [CommentsController::class,'edit'] );
    Route::put('comment/{id}/update', [CommentsController::class,'update'] )->name('comment.update');
    
    
    Route::resource('projects.attachers', AttachersController::class);
    
    Route::resource('projects.tasks', TasksController::class);
    Route::post('delete-task', [TasksController::class,'destroy'] );

    // Route::get('projects.tasks', [TasksController::class, 'index'] );
    // Route::post('/tasks', [TasksController::class, 'store'] );

    Route::resource('projects.discussions', DiscussionsController::class);


    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
