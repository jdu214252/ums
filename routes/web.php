<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('groups', App\Http\Controllers\GroupController::class);


Route::middleware('auth')->group(function () {
 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('groups', \App\Http\Controllers\GroupController::class)->names('groups');
    Route::resource('students', \App\Http\Controllers\StudentController::class)->names('students');
    Route::resource('teacher', \App\Http\Controllers\TeacherController::class)->names('teacher');
    Route::resource('subject', \App\Http\Controllers\SubjectController::class)->names('subject');

});


require __DIR__.'/auth.php';
