<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Membre::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memb=new Membre();
        $memb->nom=$request->nom;
        $memb->prenom=$request->prenom;
        $memb->image=$request->image;
        $memb->iduser=$request->iduser;
        $memb->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Membre::find($id)->session()->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $memb=Membre::findOrFail($id);
        if(!empty($request->nom))
        $memb->nom=$request->nom;
        if(!empty($request->prenom))
        $memb->prenom=$request->prenom;
        if(!empty($request->image))
        $memb->image=$request->image;
        if(!empty($request->iduser))
        $memb->iduser=$request->iduser;
        $memb->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Membre::findOrFail($id)->delete();
    }
    public function commentaire_membre(string $id){
        $membre=Membre::find($id);
        return response()->json($membre->commentaire()->get());

    }
}
