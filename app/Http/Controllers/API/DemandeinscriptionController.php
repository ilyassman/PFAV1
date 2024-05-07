<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Demandeinscription;
use App\Models\Membre;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class DemandeinscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Demandeinscription::all();
        
        return (response()->json($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demande=new Demandeinscription();
        if(!empty($request->id_membre))
        $demande->id_membre=$request->id_membre;
        if(!empty($request->id_formation))
        $demande->id_formation =$request->id_formation;
        if(!empty($request->nom))
        $demande->nom=$request->nom;
        if(!empty($request->prenom))
        $demande->prenom=$request->prenom;
        if(!empty($request->email))
        $demande->email=$request->email;
        if(!empty($request->tele))
        $demande->tele=$request->tele;
        if(!empty($request->pay))
        $demande->pay=$request->pay;
        $demande->save();
        
    }
    public function adddemande(Request $request)
    {
       
        try {
            
            // Récupérer l'ID de la formation à partir de la requête
            $encryptedId = $request->input('id');
            $formationId = Crypt::decrypt($encryptedId);
        $demande=new Demandeinscription();
        if(!empty(Auth::id()))
        {
            $membre = Membre::where('iduser', Auth::id())->first(); 
        $demande->id_membre= $membre->id;
        }
        $demande->id_formation =$formationId;
        if(!empty($request->nom))
        $demande->nom=$request->nom;
        if(!empty($request->prenom))
        $demande->prenom=$request->prenom;
        if(!empty($request->email))
        $demande->email=$request->email;
        if(!empty($request->tel))
        $demande->tele=$request->tel;
        if(!empty($request->pays))
        $demande->pay=$request->pays;
        $demande->save(); 
        return redirect()->route('page-de-redirection');
        } catch (DecryptException $e) {
            abort(404);
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
