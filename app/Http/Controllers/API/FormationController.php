<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use DB;
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $for=DB::select("SELECT f.*, case 
        when v.niveau_etoile is null then 0
        else niveau_etoile
      end as  niveau_etoile
              FROM formations f 
              LEFT JOIN sessions s ON f.id = s.id_formation 
              LEFT JOIN votes v ON v.id_session = s.id;
        ");
        return response()->json($for);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form=new Formation();
        $form->titre=$request->titre;
        $form->prix=$request->prix;
        $form->contenue=$request->contenue;
        $form->disponibilite=$request->disponibilite;
        $form->langue=$request->langue;
        $form->image=$request->image;
        $form->niveau=$request->niveau;
        $form->prerequis=$request->prerequis;
        $form->objectif=$request->objectif;
        $form->categ_id=$request->categ_id;
        $form->programme=$request->programme;
        if ($request->hasFile('image')) {
            // Récupérer le fichier image
            $image = $request->file('image');
            
            // Générer un nom de fichier unique pour l'image
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            // Enregistrer l'image dans le stockage (storage/app/public/images)
            $image->move(public_path('/Formationpic'), $fileName);
            
            // Enregistrer le chemin de l'image dans la base de données
            $form->image = $fileName;
        }
        if ($request->hasFile('video')) {
            // Récupérer le fichier image
            $video = $request->file('video');
            
            // Générer un nom de fichier unique pour l'image
            $fileName = time() . '_' . $video->getClientOriginalName();
            
            // Enregistrer l'image dans le stockage (storage/app/public/images)
            $video->move(public_path('/Formationvideo'), $fileName);
            
            // Enregistrer le chemin de l'image dans la base de données
            $form->video = $fileName;
        }
        
        $form->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Formation::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form=Formation::findOrFail($id);
       
        if(!empty($request->titre))
        $form->titre=$request->titre;
        if(!empty($request->prix))
        $form->prix=$request->prix;
        if(!empty($request->contenue))
        $form->contenue=$request->contenue;
        $form->disponibilite=$request->disponibilite;    
        if(!empty($request->langue))
        $form->langue=$request->langue;
        if(!empty($request->image))
        $form->image=$request->image;
        if(!empty($request->niveau))
        $form->niveau=$request->niveau;
        if(!empty($request->prerequis))
        $form->prerequis=$request->prerequis;
        if(!empty($request->objectif))
        $form->objectif=$request->objectif;
        if(!empty($request->categ_id))
        $form->categ_id=$request->categ_id;
        if(!empty($request->programme))
        $form->programme=$request->programme;
    
        $form->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Formation::findOrFail($id)->delete();
    }
}
