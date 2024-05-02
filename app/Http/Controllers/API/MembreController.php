<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use Illuminate\Http\Request;
use DB;
class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas=DB::select("select utilisateurs.*,nom,prenom,image from utilisateurs ,membres 
        WHERE membres.iduser=utilisateurs.id");
        return response()->json($datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memb=new Membre();
        if(!empty($request->nom))
        $memb->nom=$request->nom;
        if(!empty($request->prenom))
        $memb->prenom=$request->prenom;
        if(!empty($request->image))
        $memb->image=$request->image; 
        if(!empty($request->iduser))
        $memb->iduser=$request->iduser;
        if ($request->hasFile('image')) {
            // Récupérer le fichier image
            $image = $request->file('image');
            
            // Générer un nom de fichier unique pour l'image
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            // Enregistrer l'image dans le stockage (storage/app/public/images)
            $image->move(public_path('/Membrespic'), $fileName);
            
            // Enregistrer le chemin de l'image dans la base de données
            $memb->image = $fileName;
        }
    
        $memb->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas=DB::select("select utilisateurs.*,nom,prenom,image from utilisateurs ,membres 
        WHERE membres.iduser=utilisateurs.id and utilisateurs.id=$id");
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $memb=Membre::findOrFail($id);
        if ($request->has('nom')) {
            $memb->nom = $request->input('nom');
            dd('yess');
        }
        else
        dd("nooon");
        if(!empty($request->prenom))
        $memb->prenom=$request->prenom;
        if(!empty($request->image))
        $memb->image=$request->image;
        if(!empty($request->iduser))
        $memb->iduser=$request->iduser;
        if ($request->hasFile('image')) {
            // Récupérer le fichier image
            $image = $request->file('image');
            
            // Générer un nom de fichier unique pour l'image
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            // Enregistrer l'image dans le stockage (storage/app/public/images)
            $image->move(public_path('/Membrespic'), $fileName);
            
            // Enregistrer le chemin de l'image dans la base de données
            $memb->image = $fileName;
        }
        
        // $memb->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membre = Membre::where('iduser', $id)->first();
        // Vérifier si le support existe
    if($membre) {
        // Supprimer le fichier associé s'il existe
        if(file_exists(public_path('/Membrespic/' . $membre->image))) {
            unlink(public_path('/Membrespic/' . $membre->image));
        }

        return "Le membre a été supprimé avec succès.";
    } else {
        return "Le membre que vous essayez de supprimer n'existe pas.";
    }
    }
    public function commentaire_membre(string $id){
        $membre=Membre::find($id);
        return response()->json($membre->commentaire()->get());

    }
    public function isEmailexist(string $email)
    {
        $datas=DB::select("select * from utilisateurs where email='$email'");
        if($datas)
        return 1;
        else return 0;
    }
}
