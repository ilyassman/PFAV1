<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formateur;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use DB;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas=DB::select("select utilisateurs.*,nom,prenom,image,description from utilisateurs ,formateurs 
        WHERE formateurs.iduser=utilisateurs.id");
        return response()->json($datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form=new Formateur();
        $form->nom=$request->nom;
        $form->prenom=$request->prenom;
        $form->iduser=$request->iduser;
        $form->description=$request->description;
        if ($request->hasFile('image')) {
            // Récupérer le fichier image
            $image = $request->file('image');
            
            // Générer un nom de fichier unique pour l'image
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            // Enregistrer l'image dans le stockage (storage/app/public/images)
            $image->move(public_path('/Formateurspic'), $fileName);
            
            // Enregistrer le chemin de l'image dans la base de données
            $form->image = $fileName;
        }
        $form->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas=DB::select("select utilisateurs.*,nom,prenom,image,description from utilisateurs ,formateurs 
        WHERE formateurs.iduser=utilisateurs.id and formateurs.iduser=$id");
        return response()->json($datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=utilisateur::find($id);
        $memb = Formateur::where('iduser', $id)->first();
        if(!empty($request->email))
        $user->email=$request->email;
        if(!empty($request->password))
        $user->password=$request->password;
        if(!empty($request->num_tel))
        $user->num_tel=$request->num_tel;
        if(!empty($request->type))
        $user->type=$request->type;
        if(!empty($request->nom))
        $memb->nom=$request->nom;
        if(!empty($request->prenom))
        $memb->prenom=$request->prenom;
        if(!empty($request->description))
        $memb->description=$request->description;
        if(!empty($request->iduser))
        $memb->iduser=$request->iduser;
        $user->save();
        $memb->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Formateur::find($id)->delete();
    }
    public function sessionform(string $id){
        $form=Formateur::find($id);
        return response()->json($form->session()->get());

    }
}
