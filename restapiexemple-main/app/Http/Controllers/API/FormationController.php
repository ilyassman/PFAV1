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
        $for=DB::select("select f.*,niveau_etoile from formations f,votes v,sessions s 
        where f.id=s.id_formation");
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
        $form->date_publication=$request->date_publication;
        $form->langue=$request->langue;
        $form->image=$request->image;
        $form->niveau=$request->niveau;
        $form->prerequis=$request->prerequis;
        $form->objectif=$request->objectif;
        $form->categ_id=$request->categ_id;
        $form->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Formation::find($id);
        return response()->json($data->session()->get());
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
        if(!empty($request->disponibilite))
        $form->disponibilite=$request->disponibilite;
        if(!empty($request->date_publication))
        $form->date_publication=$request->date_publication;
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
