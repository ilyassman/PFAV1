<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Formateur::all());
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
        $form->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Formateur::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form=Formateur::find($id);
        if(!empty($request->nom))
        $form->nom=$request->nom;
        if(!empty($request->prenom))
        $form->prenom=$request->prenom;
        $form->save();
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
