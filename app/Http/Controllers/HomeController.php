<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        $datas=Categorie::take(6)->get();
        $formations=DB::select("SELECT f.*, case 
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f 
              LEFT JOIN sessions s ON f.id = s.id_formation 
              LEFT JOIN votes v ON v.id_session = s.id;
        ");
        $formateurs=Formateur::take(6)->get();
        return view("welcome",compact('datas','formations','formateurs'));

    }
    public function login(){
        $datas=Categorie::take(6)->get();
        return view("login",compact('datas'));
    }
    public function courses(){
        $datas=Categorie::take(6)->get();
        $formations=DB::select("SELECT f.*, case 
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f 
              LEFT JOIN sessions s ON f.id = s.id_formation 
              LEFT JOIN votes v ON v.id_session = s.id;
        ");
        return view("courses",compact('datas','formations'));
    }
    public function course(){

        $datas=Categorie::take(6)->get();
        return view("course-single",compact('datas'));
    }

    public function showCourseSingle(Request $request)
    {
        // Récupérer l'ID de la formation à partir de la requête
        $formationId = $request->input('id');

        // Récupérer la formation correspondante depuis la base de données
        $formation = Formation::find($formationId);

        // Vérifier si la formation existe
        if (!$formation) {
            // Si la formation n'est pas trouvée, retourner une erreur 404
            abort(404);
        }

        // Retourner la vue 'course-single' avec la formation
        return view('course-single', compact('formation'));
    }



}
