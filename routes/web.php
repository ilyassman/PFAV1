<?php

use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Postcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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
Route::get('/register', [HomeController::class, 'registered'])->name('register');
Route::get('/courses',[HomeController::class,'courses'])->name('courses');
Route::get('/course',[HomeController::class,'course'])->name('course');
Route::get('/course', [HomeController::class, 'showCourseSingle'])->name('course');
Route::get('/admin', [HomeController::class, 'showdash'])->name('admin');
Route::get('/membres', [HomeController::class, 'showmembre'])->name('membres');
Route::get('/commentaires', [HomeController::class, 'showcomment'])->name('commentaires');
Route::get('/formateurs', [HomeController::class, 'showformateurs'])->name('formateurs');
Route::get('/formations', [HomeController::class, 'showformation'])->name('formations');
Route::get('/sessions', [HomeController::class, 'showsession'])->name('sessions');
Route::get('/supports', [HomeController::class, 'showsupport'])->name('support');
Route::get('/ecole', [HomeController::class, 'showecole'])->name('ecole');
Route::get('/inscription', [HomeController::class, 'inscriformation'])->name('inscription');
Route::get('/gererSessions', [HomeController::class, 'showgererSessions'])->name('gererSessions');
Route::get('/encrypt-id/{id}', function ($id) {
    return response()->json(['encrypted_id' => Crypt::encrypt($id)]);
});
Route::get('/chartmembre', [HomeController::class, 'chartmembre']);
Route::post('/register', [RegisterController::class, 'register']); // Pour soumettre le formulaire d'inscription
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
