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
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function index()
    {
        $datas = Categorie::take(6)->get();
        $ecole = Ecole::first();
        $formations = DB::select("SELECT f.*, case
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f

              LEFT JOIN votes v ON v.id_formation = f.id;
        ");
        $formateurs = Formateur::take(6)->get();
        return view("welcome", compact('datas', 'formations', 'formateurs', 'ecole'));

    }
    public function login()
    {
        $datas = Categorie::take(6)->get();
        return view("login", compact('datas'));
    }
    public function courses()
    {
        $datas = Categorie::take(6)->get();
        $formations = DB::select("SELECT f.*, case
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f

              LEFT JOIN votes v ON v.id_formation = f.id;
        ");
        return view("courses", compact('datas', 'formations'));
    }
    public function course()
    {

        $datas = Categorie::take(6)->get();
        return view("course-single", compact('datas'));
    }
    public function showmembre()
    {
        $datas = DB::select("select utilisateurs.*,nom,prenom,image from utilisateurs ,membres
        WHERE membres.iduser=utilisateurs.id");
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");

        return view("Admin/pages/tables/Membres", compact('datas','notifs'));
    }
    public function showcomment()
    {
        $datas = DB::select("select commentaires.*,membres.nom,membres.prenom,formations.titre from commentaires,membres,formations where commentaires.membre_id=membres.id and commentaires.formation_id=formations.id");
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/pages/tables/Commentaires", compact('datas','notifs'));
    }
    public function showformateurs()
    {
        $datas = DB::select("select utilisateurs.*,nom,prenom,image,description from utilisateurs ,formateurs
        WHERE formateurs.iduser=utilisateurs.id");
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/pages/tables/Formateurs", compact('datas','notifs'));
    }
    public function showformation()
    {
        $datas = Formation::all();
        $categs = Categorie::all();
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/pages/tables/Formations", compact('datas', 'categs','notis'));
    }
    public function showsession()
    {
        $datas = DB::select("select sessions.*,formations.titre,formateurs.nom,formateurs.prenom
        from sessions,formations,formateurs where sessions.id_formation=formations.id and formateurs.id=sessions.id_formateur");
        $formations = Formation::all();
        $formateurs = Formateur::all();
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/pages/tables/Sessions", compact('datas', 'formations', 'formateurs','notifs'));
    }
    public function showsupport()
    {
        $datas = DB::select("select supports.*,formations.titre as formation from supports,formations where supports.id_formation=formations.id");
        $formations = Formation::all();
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/pages/tables/support", compact('datas', 'formations','notifs'));
    }
    public function showecole()
    {
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        $ecole = Ecole::first();
        return view("Admin/pages/tables/ecole", compact('ecole','notifs'));
    }
    public function showdash()
    {
        $datas = DB::select("SELECT
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
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");
        return view("Admin/admin", compact('datas', 'chart1','notifs'));
    }
    public function showCourseSingle(Request $request)
    {
        try {
            // Récupérer l'ID de la formation à partir de la requête
            $encryptedId = $request->input('id');
            $formationId = Crypt::decrypt($encryptedId);

            // Récupérer la formation correspondante depuis la base de données
            $formation = Formation::find($formationId);

            if (!$formation) {
                abort(404);
            }


            return view('course-single', compact('formation'));
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function inscriformation(Request $request)
    {
        try {
            // Récupérer l'ID de la formation à partir de la requête
            $encryptedId = $request->input('id');
            $formationId = Crypt::decrypt($encryptedId);

            // Récupérer la formation correspondante depuis la base de données
            $formation = Formation::find($formationId);

            if (!$formation) {
                abort(404);
            }
            if(!empty(Auth::id())){
            $iduser=Auth::id();
            $membre=DB::select("select * from membres,utilisateurs where membres.iduser=utilisateurs.id and utilisateurs.id=$iduser");
            return view('inscription_form', compact('formation','membre'));
            }
            else{
                return view('inscription_form', compact('formation'));
            }


        } catch (DecryptException $e) {
            abort(404);
        }
    }
    public function showgererSessions()
    {
        $sessions = DB::select("select sessions.*,formations.titre from sessions,formations WHERE sessions.id_formation=formations.id");
        $membres = DB::select("select utilisateurs.*,membres.id as idmembre,nom,prenom,image from utilisateurs ,membres
        WHERE membres.iduser=utilisateurs.id");
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");

        return view('Admin/pages/tables/gererSessions', compact('sessions', 'membres','notifs'));
    }
    public function registered()
    {
        $datas = Categorie::take(6)->get();
        return view('register', compact('datas'));
    }


    public function profile()
    {
        $user = Auth::user();
        if ($user && $user->type === 2) {
            $membre = Membre::where('iduser', $user->id)->first();
            $datas = Categorie::take(6)->get();

            // Ajout de la requête pour sélectionner les formations de l'utilisateur connecté avec l'état 1
            $formations = DB::select("select formations.* from formations,demandeinscriptions
            where formations.id=demandeinscriptions.id_formation
            and demandeinscriptions.etat=1 and demandeinscriptions.id_membre=$membre->id ;") ;

            return view('profile', compact('user', 'membre', 'datas', 'formations'));
        } else {
            return redirect('/login')->with('error', 'Vous devez être connecté en tant qu\'utilisateur de type 2 pour accéder à votre profil.');
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
        $dataset = [];
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
    public function chartcateg(){
        $datas=DB::select("select categories.nom,count(*) nbrformation from formations,categories
        where categories.id=formations.categ_id
        group by categories.nom;");
        $dataset=[];
      foreach($datas as $data){
          $dataset['labels'][]=$data->nom;
          $dataset['nbr'][] = $data->nbrformation;
      }
        return  [
          'labels'=> $dataset['labels'],
          'dataset'=>$dataset['nbr']

        ];
      }


      public function Membres_Formation()
      {
        $formations = Formation::all();
        $notifs=DB::select("select (select count(*) from demandeinscriptions where etat=0)as nbr ,demandeinscriptions.*,formations.titre from formations,demandeinscriptions
        where formations.id=demandeinscriptions.id_formation
        and demandeinscriptions.etat=0;");


         return view("Admin/pages/tables/Membres_Formation",compact('formations','notifs'));
      }
      public function getMembers($formationId) {
        $formation = Formation::findOrFail($formationId);
        $members = $formation->membres;
        return response()->json(['members' => $members]);
    }
    public function msgdemande(){
        $datas = Categorie::take(6)->get();
        return view('message_inscription',compact('datas'));
    }
    public function formation_membre(){
        $datas = Categorie::take(6)->get();
        return view('formation_membre',compact('datas'));
    }
}

