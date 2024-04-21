<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ecole = new Ecole();
        $ecole->nom = $request->nom;
        $ecole->propos = $request->propos;
        $ecole->domaine = $request->domaine;
        $ecole->numero_whatsapp = $request->numeroWhatsApp;
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
