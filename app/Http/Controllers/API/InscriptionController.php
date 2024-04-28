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
        if($request->etat==0 || $request->etat==1){
            $data->etat=$request->etat;
        }
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
    public function removemembre(string $id,string $idsession)
    {
        $inscription = Inscription::where([
            'id_membre' => $id,
            'id_session' => $idsession
        ])->first();
        $inscription->delete();
    }
    public function update2(Request $request, string $id,string $idsession)
    {
        $inscription = Inscription::where([
            'id_membre' => $id,
            'id_session' => $idsession
        ])->first();
        if($request->etat==0 || $request->etat==1){
            $inscription->etat=$request->etat;
        }
        $inscription->save();
    }
}
