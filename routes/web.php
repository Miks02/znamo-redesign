<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

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

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'navbar.administracija-dashboard')->name('dashboard');
    Route::view('profil', 'profile.profile')->name('profile');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get("/dashboard/{view}", function($view) {
        $allowedViews = ['admin', 'add-project', 'add-user', 'projects-table', 'profile'];        
        if(Auth::user()->is_admin == true) {
            if(in_array($view, $allowedViews))
            return view("dashboard.$view")->render();
            
        }
        else {
            $allowedViews = ['add-project', 'projects-table', 'profile'];
            if(in_array($view, $allowedViews))
            return view("dashboard.$view")->render();
            
        }
        abort(404);
    })->name('return-view');
    
    
});






// Route::get('/', function () {
//     return view('index');
// })->name('home');

// Route::get('/#about', function() {
//     return view('#about');
// })->name('about');

// Route::get('/projekti', function() {
//     return view('navbar/projekti');
// })->name('projects');

// Route::get('login', [LoginController::class, 'showLogin'])->name('login');

// Route::Post('/kontakt/POST', function() {

// });

// route::Get('/kontakt', function() {
//     return view('navbar/kontakt');
// })->name('contact');

// Route::post('/login', [LoginController::class, 'authenticate'])->name('login-post');

// Route::get('dashboard', function() {
//     return view('navbar/administracija-dashboard');
// })->name('dashboard');

// Route::get('profil', function() {
//     return Auth::check() ? view('profile.profile') : view('index');
// })->name('profile');

// Route::get('logout', [LoginController::class, 'logout'])->name('logout');