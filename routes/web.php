<?php

use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Postcontroller;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/courses',[HomeController::class,'courses'])->name('courses');
Route::get('/course',[HomeController::class,'course'])->name('course');
Route::get('/course', [HomeController::class, 'showCourseSingle'])->name('course');
Route::get('/admin', [HomeController::class, 'showdash'])->name('admin');
Route::get('/membres', [HomeController::class, 'showmembre'])->name('membres');
Route::get('/commentaires', [HomeController::class, 'showcomment'])->name('commentaires');
Route::get('/formateurs', [HomeController::class, 'showformateurs'])->name('formateurs');
Route::get('/formations', [HomeController::class, 'showformation'])->name('formations');
Route::get('/sessions', [HomeController::class, 'showsession'])->name('sessions');
Route::get('/support', [HomeController::class, 'showsupport'])->name('support');
Route::get('/ecole', [HomeController::class, 'showecole'])->name('ecole');


