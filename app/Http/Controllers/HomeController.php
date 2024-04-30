<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Ecole;
use App\Models\Formateur;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Membre;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class HomeController extends Controller
{
    public function index(){
        $datas=Categorie::take(6)->get();
        $ecole=Ecole::first();
        $formations=DB::select("SELECT f.*, case
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f
              LEFT JOIN sessions s ON f.id = s.id_formation
              LEFT JOIN votes v ON v.id_session = s.id;
        ");
        $formateurs=Formateur::take(6)->get();
        return view("welcome",compact('datas','formations','formateurs','ecole'));

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
        $datas=DB::select("select supports.*,formations.titre as formation from supports,formations where supports.id_formation=formations.id");
        $formations=Formation::all();
        return view("Admin/pages/tables/support",compact('datas','formations'));
     }
     public function showecole(){
        $ecole=Ecole::first();
        return view("Admin/pages/tables/ecole",compact('ecole'));
     }
     public function showdash(){
        $datas=DB::select("SELECT
        (SELECT COUNT(id) FROM formations) AS nbrformation,
        (SELECT COUNT(id) FROM membres) AS nbrmembre,
        (SELECT COUNT(id) FROM sessions) AS nbrsession,
        (SELECT COUNT(id) FROM formateurs) AS nbrformateur,
        (SELECT COUNT(id) FROM commentaires) AS nbrcomment;");
        $chart_options = [
            'chart_title' => 'Les clients inscrits par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Membre',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view("Admin/admin",compact('datas','chart1'));
     }
    public function showCourseSingle(Request $request)
    {
        // Récupérer l'ID de la formation à partir de la requête
        $formationId = Crypt::decrypt($request->input('id'));

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
    public function showgererSessions()
    {
        $sessions=DB::select("select sessions.*,formations.titre from sessions,formations WHERE sessions.id_formation=formations.id");
        $membres=DB::select("select utilisateurs.*,membres.id as idmembre,nom,prenom,image from utilisateurs ,membres
        WHERE membres.iduser=utilisateurs.id");
        return view('Admin/pages/tables/gererSessions',compact('sessions','membres'));
    }
    public function registered()
    {
        $datas=Categorie::take(6)->get();
        return view('register',compact('datas'));
    }


    public function profile()
    {
        $user = Auth::user();
        if ($user) {
            $membre = Membre::where('iduser', $user->id)->first(); // Récupérer le membre associé à l'utilisateur
            $datas = Categorie::take(6)->get();
            return view('profile', compact('user', 'membre', 'datas')); // Passer à la vue les informations de l'utilisateur et de son membre associé
        } else {
            return redirect('/login')->with('error', 'Veuillez vous connecter pour accéder à votre profil.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        // Redirection vers la page de connexion avec un message de succès
        return redirect('/login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
    public function chartmembre(){
      $datas=DB::select("SELECT COUNT(*) AS nbr, MONTH(created_at) AS month  
      FROM membres  
      WHERE YEAR(created_at) = YEAR(NOW())
      GROUP BY month 
      ORDER BY month;");
      $dataset=[];
        // Créer un tableau pour stocker les données de chaque mois
    $dataset = array_fill(1, 12, 0);

    // Remplir le tableau avec les données existantes
    foreach($datas as $data){
        $month = $data->month;
        $dataset[$month] = $data->nbr;
    }
      return  [
        'dataset'=>array_values($dataset)
        
      ];


    }
}
