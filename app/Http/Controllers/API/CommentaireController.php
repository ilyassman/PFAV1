<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use DB;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Commentaire::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comm=new Commentaire();
        $comm->contenu=$request->contenu;
        $comm->date_de_publication=$request->date_de_publication;
        $comm->membre_id=$request->membre_id;
        $comm->formation_id=$request->formation_id;
        $comm->save();}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comm=Commentaire::find($id);
       
        $comm->contenu=$request->contenu;
        $comm->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commentaire::find($id)->delete();
    }
    public function findbyformation($formationid){
        $datas=DB::select("select c.*,m.* from commentaires c,formations f,membres m where c.membre_id=m.id  and c.formation_id=f.id  and formation_id={$formationid}");
        return response()->json($datas);
    }
}
