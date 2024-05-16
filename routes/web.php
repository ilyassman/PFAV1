<?php

use App\Http\Controllers\API\DemandeinscriptionController;
use App\Http\Controllers\GenerateCertif;
use App\Http\Controllers\HomeController;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Membre;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Categorie;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'registered'])->name('register');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/course', [HomeController::class, 'course'])->name('course');
Route::get('/course', [HomeController::class, 'showCourseSingle'])->name('course');
Route::get('/admin', [HomeController::class, 'showdash'])->name('admin')->middleware('auth');
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
Route::get('/decrypt-id/{id}', function ($id) {
    $membre = Membre::where('iduser', Auth::id())->first();
    $sessionId = Crypt::decrypt($id);
    $session=Session::find($sessionId);
    $formation=Formation::find($session->id_formation);
    return response()->json(['idform' => $formation->id, 'idmembre' => $membre->id]);
});
Route::get('/idsession', function () {
    return response()->json(['iduser' => Auth::id()]);
});

Route::get('/chartmembre', [HomeController::class, 'chartmembre']);

Route::get('/restpass', function () {
    $datas = Categorie::take(6)->get();
    return view('rest_pass', compact('datas'));
})->name('restpass');

// Route::get('/changePass', function () {
//     $datas = Categorie::take(6)->get();
//     return view('changePass', compact('datas'));
// })->name('changePass');



Route::post('/modifPassword', [HomeController::class, 'restpass'])->name('modifPassword1');
Route::post('/changepass', [HomeController::class, 'changerpass'])->name('changepass');
Route::post('/confirmpass', [HomeController::class, 'confirmpass'])->name('confirmpass');
// Route::post('/changepass', [HomeController::class, 'changerpass'])->name('changepass');


// Route::post('/restpass1', [ResetPasswordController::class])->name('restpass1');
Route::get('/Certifgenerat', [GenerateCertif::class, 'Certifgenerat'])->name('Certifgenerat');

Route::get('/chartcateg', [HomeController::class, 'chartcateg']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/Membres_Formation', [HomeController::class, 'Membres_Formation'])->name('Membres_Formation');
Route::post('/adddemande', [DemandeinscriptionController::class, 'adddemande'])->name('addemande');
Route::get('/message_inscription', [HomeController::class, 'message_inscription'])->name('message_inscription');
Route::get('/getmembers/{id}', [HomeController::class, 'getMembers'])->name('getmembers');
Route::get('/getmembers/{id}', [HomeController::class, 'getMembers'])->name('getmembers');
Route::get('/page-de-redirection/', [HomeController::class, 'msgdemande'])->name('page-de-redirection');
Route::get('/formation_membre', [HomeController::class, 'formation_membre'])->name('formation_membre')->middleware('auth');


