<?php

use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\API\FormateurController;
use App\Http\Controllers\API\FormateurSessionController;
use App\Http\Controllers\API\FormationController;
use App\Http\Controllers\API\InscriptionController;
use App\Http\Controllers\API\MembreController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\SessionController;
use App\Http\Controllers\API\UtilisateurController;
use App\Http\Controllers\API\VoteController;
use App\Http\Controllers\API\CourseSingleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::apiResource('posts', PostController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('users', UtilisateurController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('membres', MembreController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('formateurs', FormateurController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('formations', FormationController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('commentaires', CommentaireController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('sessions',SessionController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('FormateurSession',FormateurSessionController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('inscription',InscriptionController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('votes',VoteController::class
    );
});
Route::prefix('v1')->group(function () {
    Route::apiResource('categories',CategorieController::class
    );
});
Route::get('commentaires/{idformation}',[CommentaireController::class,'findbyformation']);
Route::get('membrecommentaires/{idmembre}',[MembreController::class,'commentaire_membre']);
Route::get('formateursession/{idformateur}',[FormateurController::class,'sessionform']);
Route::get('sessionmembres/{idsession}',[SessionController::class,'sessionmembres']);

Route::get('sessionvotes/{idsession}',[SessionController::class,'sessionvotes']);
Route::get('login/{email}/{pass}',[UtilisateurController::class,'login']);
Route::get('/courses', 'CourseController@index')->name('courses');

