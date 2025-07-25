<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/#about', function() {
    return view('#about');
})->name('about');

Route::get('/apps', function() {
    return view('navbar/projekti/#apps');
})->name('apps');

Route::prefix('navbar')->group(function () {
    Route::view('/projekti', 'navbar/projekti')->name('projects');
    Route::view('/kontakt', 'navbar/kontakt')->name('contact');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login-post');
});

Route::POST('/kontakt', [ContactFormController::class, 'submit'])->name('contact-submit');
Route::get('/navbar/projekti', [ProjectController::class,'index'])->name('projects');

Route::middleware('auth')->group(function () {
    
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/getAuthUserId', [UserController::class, 'getAuthUserId']);
    Route::get('/isAdmin', [UserController::class, 'isAuthAdmin']);
    
    Route::get('/dashboard/getAll', [UserController::class, 'getAllUsers']);
    Route::post('/dashboard/add-user', [UserController::class, 'register']);
    Route::delete('/dashboard/deleteUser/{id}', [UserController::class, 'deleteUser']);
    Route::get('/dashboard/getUser/{id}', [UserController::class, 'getUserById']);
    Route::patch('dashboard/patch/{id}', [UserController::class, 'updatePatchUser']);
    
    Route::get('/dashboard/getAllProjects', [ProjectController::class, 'getAllProjects']);
    Route::get('/dashboard/getProjects', [ProjectController::class,'getProjects']);
    Route::get('/dashboard/getProject/{id}', [ProjectController::class,'getProjectById']);
    Route::post('/dashboard/add-project', [ProjectController::class, 'addProject']);
    Route::delete('/dashboard/deleteProject/{id}', [ProjectController::class,'deleteProject']);
    Route::patch('/dashboard/patchProject/{id}', [ProjectController::class,'updatePatchProject']);

    
    Route::get('/dashboard-views/{view}', function ($view) {
        $allowedViews = ['admin', 'add-project', 'add-user', 'projects-table', 'profile'];
        if(Auth::user()->is_admin) {
            if(in_array($view, $allowedViews))
            return view("dashboard.$view")->render();
        } else {
            $allowedViews = ['add-project', 'projects-table', 'profile'];
            if(in_array($view, $allowedViews))
            return view("dashboard.$view")->render();
        }
        
        abort(404);
    });
    
    
    Route::get("/dashboard/{any?}", function() {
        
        return view('navbar.administracija-dashboard');
    })->where('any', '.*')->name('dashboard');
    
    
});
