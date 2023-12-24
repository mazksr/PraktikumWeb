<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\JobProfileController;
use App\Http\Controllers\ProfilesController;

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
// routes/web.php


// Route::resource('job_profile', JobProfileController::class);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::resource('profiles', ProfilesController::class);

Route::post('/apply/submit-cv', [JobProfileController::class, 'store'])->name('submit-cv');

Route::get('/apply/{jobId}', [JobSeekerController::class, 'apply'])->name('apply');

Route::get('/home', [JobSeekerController::class, 'home'])->name('home');

Route::get('/upcv', [JobSeekerController::class, 'upcv'])->name('upcv');

Route::get('/profile', [JobSeekerController::class, 'profile'])->name('profile');

Route::get('/', function () {
    header("Location: /home");
    exit;
});

Route::get('/logout', 'Auth\LoginController@logout');
