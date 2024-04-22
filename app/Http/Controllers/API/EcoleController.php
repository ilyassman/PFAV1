<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use Illuminate\Http\Request;
class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("hi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Vérifier si une école existe déjà dans la base de données
    $existingEcole = Ecole::first();

    if ($existingEcole) {
        // Supprimer l'ancienne photo si elle existe
        if ($existingEcole->logo) {
            // Supprimer l'ancienne photo du stockage
            $oldLogoPath = public_path('/Ecolelogo') . '/' . $existingEcole->logo;
            if (file_exists($oldLogoPath)) {
                unlink($oldLogoPath);
            }
        }

        // Supprimer l'ancienne vidéo si elle existe
        if ($existingEcole->video) {
            // Supprimer l'ancienne vidéo du stockage
            $oldVideoPath = public_path('/Ecolevideo') . '/' . $existingEcole->video;
            if (file_exists($oldVideoPath)) {
                unlink($oldVideoPath);
            }
        }

        // Mise à jour des valeurs existantes de l'école
        $existingEcole->nom = $request->nom;
        $existingEcole->propos = $request->propos;
        $existingEcole->numero_whatsapp = $request->whatsapp;
        $existingEcole->facebook = $request->facebook;
        $existingEcole->instagram = $request->instagram;
        $existingEcole->twitter = $request->twitter;
        $existingEcole->email = $request->email;

        if ($request->hasFile('logo')) {
           // Récupérer le fichier du logo
           $logo = $request->file('logo');
    
           // Générer un nom de fichier unique pour le logo
           $logoName =  time() . '_' . $logo->getClientOriginalName();
   
           // Enregistrer le logo dans le stockage (storage/app/public/logos)
           $logo->move(public_path('/Ecolelogo'), $logoName);
   
           // Enregistrer le chemin du logo dans la base de données
           $existingEcole->logo = $logoName;
        }

        if ($request->hasFile('video')) {
             // Récupérer le fichier vidéo
             $video = $request->file('video');
    
             // Générer un nom de fichier unique pour la vidéo
             $videoName = time() . '_' . $video->getClientOriginalName();
     
             // Enregistrer la vidéo dans le stockage (storage/app/public/videos)
             $video->move(public_path('/Ecolevideo'), $videoName);
     
             // Enregistrer le chemin de la vidéo dans la base de données
             $existingEcole->video = $videoName;
        }

        // Enregistrer les modifications
        $existingEcole->save();
        return response()->json(['message' => 'École mise à jour avec succès'], 200);
    } else {
        // Créer une nouvelle école si aucune n'existe déjà
        $ecole = new Ecole();
        $ecole->nom = $request->nom;
        $ecole->propos = $request->propos;
        $ecole->numero_whatsapp = $request->whatsapp;
        $ecole->facebook = $request->facebook;
        $ecole->instagram = $request->instagram;
        $ecole->twitter = $request->twitter;
        $ecole->email = $request->email;

        
        if ($request->hasFile('logo')) {
            // Récupérer le fichier du logo
            $logo = $request->file('logo');
    
            // Générer un nom de fichier unique pour le logo
            $logoName = time() . '_' . $logo->getClientOriginalName();
    
            // Enregistrer le logo dans le stockage (storage/app/public/logos)
            $logo->move(public_path('/Ecolelogo'), $logoName);
    
            // Enregistrer le chemin du logo dans la base de données
            $ecole->logo = $logoName;
        }

        if ($request->hasFile('video')) {
            // Récupérer le fichier vidéo
            $video = $request->file('video');
    
            // Générer un nom de fichier unique pour la vidéo
            $videoName = time() . '_' . $video->getClientOriginalName();
    
            // Enregistrer la vidéo dans le stockage (storage/app/public/videos)
            $video->move(public_path('/Ecolevideo'), $videoName);
    
            // Enregistrer le chemin de la vidéo dans la base de données
            $ecole->video = $videoName;
        }

        $ecole->save();
        return response()->json(['message' => 'École créée avec succès'], 201);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
