<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Inscription::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Inscription();
        $data->date_inscription=$request->date_inscription;
        $data->etat=$request->etat;
        $data->id_membre=$request->id_membre;
        $data->id_session=$request->id_session;
        $data->save();
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
        $data=Inscription::find($id);
        if(!empty($request->date_inscription))
        $data->date_inscription=$request->date_inscription;
        if(!empty($request->etat))
        $data->etat=$request->etat;
        if(!empty($request->id_membre))
        $data->id_membre=$request->id_membre;
        if(!empty($request->id_session))
        $data->id_session=$request->id_session;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inscription::find($id)->delete();
    }
}
