<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Demandeinscription;
use Illuminate\Http\Request;

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
        dd("hi");
        // $demande=new Demandeinscription();
        // if(!empty($request->id_membre))
        // $demande->id_membre=$request->id_membre;
        // if(!empty($request->id_formation))
        // $demande->id_formation =$request->id_formation;
        // if(!empty($request->nom))
        // $demande->nom=$request->nom;
        // if(!empty($request->prenom))
        // $demande->prenom=$request->prenom;
        // if(!empty($request->email))
        // $demande->email=$request->email;
        // if(!empty($request->tele))
        // $demande->tele=$request->tele;
        // if(!empty($request->pay))
        // $demande->pay=$request->pay;
        // $demande->save();
        
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
