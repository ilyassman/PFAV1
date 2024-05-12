<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Hash;
use App\Models\Ecole;
use App\Models\Formateur;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Membre;
use App\Models\Support;
use App\Models\utilisateur;
use App\Mail\RestPassword;
use App\Models\Vote;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $datas = Categorie::take(6)->get();
        $ecole = Ecole::first();
        $formations = DB::select("SELECT f.id, f.titre, f.prix, f.contenue, f.disponibilite,
        f.langue, f.image, f.niveau, f.prerequis, f.objectif,
        f.created_at, f.updated_at, f.categ_id, f.programme,
        CASE
            WHEN ROUND(AVG(v.niveau_etoile)) IS NULL THEN 0
            ELSE ROUND(AVG(v.niveau_etoile))
        END AS niveau_etoile
 FROM formations f
 LEFT JOIN votes v ON v.id_formation = f.id
 GROUP BY f.id, f.titre, f.prix, f.contenue, f.disponibilite,
         f.langue, f.image, f.niveau, f.prerequis, f.objectif,
         f.created_at, f.updated_at, f.categ_id, f.programme;

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
        $formations = DB::select("SELECT f.id, f.titre, f.prix, f.contenue, f.disponibilite,
        f.langue, f.image, f.niveau, f.prerequis, f.objectif,
        f.created_at, f.updated_at, f.categ_id, f.programme,
        CASE
            WHEN ROUND(AVG(v.niveau_etoile)) IS NULL THEN 0
            ELSE ROUND(AVG(v.niveau_etoile))
        END AS niveau_etoile
 FROM formations f
 LEFT JOIN votes v ON v.id_formation = f.id
 GROUP BY f.id, f.titre, f.prix, f.contenue, f.disponibilite,
         f.langue, f.image, f.niveau, f.prerequis, f.objectif,
         f.created_at, f.updated_at, f.categ_id, f.programme;
        ");
        return view("courses", compact('datas', 'formations'));
    }
    public function course()
    {
        $datas = Categorie::take(6)->get();
        $membre= Membre::where('iduser', Auth::id())->first();
        return view("course-single", compact('datas','membre','vote'));
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
        return view("Admin/pages/tables/Formations", compact('datas', 'categs','notifs'));
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
        $user=utilisateur::find(Auth::id());
        $ecole=Ecole::first();
        if($user->type==0){
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
        return view("Admin/admin", compact('datas', 'chart1','notifs','ecole'));
    }
    else{
        $datas = Categorie::take(6)->get();
        $ecole = Ecole::first();
        $formations = DB::select("SELECT f.id, f.titre, f.prix, f.contenue, f.disponibilite,
        f.langue, f.image, f.niveau, f.prerequis, f.objectif,
        f.created_at, f.updated_at, f.categ_id, f.programme,
        CASE
            WHEN ROUND(AVG(v.niveau_etoile)) IS NULL THEN 0
            ELSE ROUND(AVG(v.niveau_etoile))
        END AS niveau_etoile
 FROM formations f
 LEFT JOIN votes v ON v.id_formation = f.id
 GROUP BY f.id, f.titre, f.prix, f.contenue, f.disponibilite,
         f.langue, f.image, f.niveau, f.prerequis, f.objectif,
         f.created_at, f.updated_at, f.categ_id, f.programme;

        ");
        $formateurs = Formateur::take(6)->get();
        return view("welcome",compact('datas','ecole','formations','formateurs'));
    }
    }
    public function showCourseSingle(Request $request)
    {
        try {
            // Récupérer l'ID de la formation à partir de la requête
            $encryptedId = $request->input('id');
            $formationId = Crypt::decrypt($encryptedId);
            $membre= Membre::where('iduser', Auth::id())->first();
            // Récupérer la formation correspondante depuis la base de données
            $formation = Formation::find($formationId);

            if (!$formation) {
                abort(404);
            }
            $isInscrit=false;
            if(isset($membre->id)){
            $result = DB::select("select * from membres where id=$membre->id and id in (
                SELECT demandeinscriptions.id_membre from demandeinscriptions
                where demandeinscriptions.id_formation=$formationId
            )");
            $isInscrit=count($result)>0;
            }
            $vote=DB::select("SELECT ROUND(AVG(votes.niveau_etoile)) as nbr
            from votes
            where votes.id_formation=$formationId
            group by votes.id_formation
                      ");
            $comments=DB::select("select commentaires.*,membres.nom,membres.prenom,membres.image from commentaires,membres where commentaires.formation_id=$formationId
            AND
            commentaires.membre_id=membres.id;");
            return view('course-single', compact('formation','vote','comments','membre','isInscrit'));
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
        if ($user && $user->type ===2 ) {
            $membre = Membre::where('iduser', $user->id)->first();
            $datas = Categorie::take(6)->get();
            $formations = DB::select("select formations.* from formations,demandeinscriptions
            where formations.id=demandeinscriptions.id_formation
            and demandeinscriptions.etat=1 and demandeinscriptions.id_membre=$membre->id ;") ;

            return view('profile', compact('user', 'membre', 'datas', 'formations'));
        }
        else if($user && $user->type ===1){
            $membre = Formateur::where('iduser', $user->id)->first();
            $datas = Categorie::take(6)->get();
            $formations = DB::select("select formations.* from formations,formateurs,sessions
            where formations.id=sessions.id_formation
            and sessions.id_formateur=formateurs.id and formateurs.id=$membre->id;") ;

            return view('profile', compact('user', 'membre', 'datas', 'formations'));
        }
        
        else {
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
    public function msgdemande(Request $request){
        $datas = Categorie::take(6)->get();
        $encryptedId = $request->input('id');
        $formationId = Crypt::decrypt($encryptedId);
        $formation=Formation::find($formationId);
        return view('message_inscription',compact('datas','formation'));
    }
    public function formation_membre(Request $request){
        $encryptedId = $request->input('id');
        $formationId = Crypt::decrypt($encryptedId);
        $datas = Categorie::take(6)->get();
        if(Auth::user()->type===2){
        $membre= Membre::where('iduser', Auth::id())->first();
        $datefin=DB::select("select sessions.date_fun from sessions,formations WHERE
        sessions.id_formation=formations.id and formations.id=$formationId");
        $supports = DB::select("select supports.*,formations.titre as formation from supports,formations where supports.id_formation=formations.id
        and formations.id=$formationId");
        $vote=Vote::where('id_membre',$membre->id)->where('id_formation',$formationId)->first();
        return view('formation_membre',compact('datas','membre','vote','supports','formationId','datefin'));
        }
        else{
            $formateur= Formateur::where('iduser', Auth::id())->first();
        $supports = DB::select("select supports.*,formations.titre as formation from supports,formations where supports.id_formation=formations.id
        and formations.id=$formationId");
        $session=Session::where('id_formation',$formationId)->first();
        return view('formation_membre',compact('datas','formateur','supports','formationId','session'));
        }
       
    }
    public function restpass(Request $request){
            $datas = Categorie::take(6)->get();
            $code = '';
            $email=$request->email;
            for ($i = 0; $i < 5; $i++) {
                $code .= mt_rand(0, 9); // Ajoute un chiffre aléatoire (0 à 9) au code
            }
            Mail::to($request->email)
            ->send(new RestPassword($code));
            return view('modif_pass', compact('datas', 'code','email'));
    }
  public function changerpass(Request $request){
    $code = implode('', $request->code);
    if($code==$request->codeemail){
        $email=$request->email;
        $datas = Categorie::take(6)->get();
    return view('changePass',compact('datas','email'));
    }
    else{
        $datas = Categorie::take(6)->get();
        $code=$request->codeemail;
        $email=$request->email;
        return view('modif_pass', compact('datas', 'code','email'))->with('error','Le code taper est invalide');
    }
  }
  public function confirmpass(Request $request){
    $user=utilisateur::where('email',$request->email)->first();
    $user->password=Hash::make($request->password);
    $user->save();
    return redirect()->route('login');
  }
}

