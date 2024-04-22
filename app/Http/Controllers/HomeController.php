<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Formateur;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Support;
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
    public function showmembre(){
        $datas=DB::select("select utilisateurs.*,nom,prenom,image from utilisateurs ,membres
        WHERE membres.iduser=utilisateurs.id");
        return view("Admin/pages/tables/Membres",compact('datas'));
     }
     public function showcomment(){
        $datas=DB::select("select commentaires.*,membres.nom,membres.prenom,formations.titre from commentaires,membres,formations where commentaires.membre_id=membres.id and commentaires.formation_id=formations.id");
        return view("Admin/pages/tables/Commentaires",compact('datas'));
     }
     public function showformateurs(){
        $datas=DB::select("select utilisateurs.*,nom,prenom,image,description from utilisateurs ,formateurs
        WHERE formateurs.iduser=utilisateurs.id");
        return view("Admin/pages/tables/Formateurs",compact('datas'));
     }
     public function showformation(){
        $datas=Formation::all();
        $categs=Categorie::all();
        return view("Admin/pages/tables/Formations",compact('datas','categs'));
     }
     public function showsession(){
        $datas=DB::select("select sessions.*,formations.titre,formateurs.nom,formateurs.prenom
        from sessions,formations,formateurs where sessions.id_formation=formations.id and formateurs.id=sessions.id_formateur");
        $formations=Formation::all();
        $formateurs=Formateur::all();
        return view("Admin/pages/tables/Sessions",compact('datas','formations','formateurs'));
     }
     public function showsupport(){
        $datas=Support::all();
        return view("Admin/pages/tables/support",compact('datas'));
     }
     public function showecole(){
        // $datas=Support::all();
        return view("Admin/pages/tables/ecole");
     }
     public function showdash(){
        $datas=DB::select("SELECT
        (SELECT COUNT(id) FROM formations) AS nbrformation,
        (SELECT COUNT(id) FROM membres) AS nbrmembre,
        (SELECT COUNT(id) FROM sessions) AS nbrsession,
        (SELECT COUNT(id) FROM formateurs) AS nbrformateur,
        (SELECT COUNT(id) FROM commentaires) AS nbrcomment;");
        return view("Admin/admin",compact('datas'));
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

    public function inscriformation()
    {
        // Ici, vous pouvez retourner la vue du formulaire d'inscription
        return view('inscription_form');
    }


}
