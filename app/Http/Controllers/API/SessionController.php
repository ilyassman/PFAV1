<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use DB;
use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::select("select sessions.*,formations.titre,formateurs.nom,formateurs.prenom
        from sessions,formations,formateurs where sessions.id_formation=formations.id and formateurs.id=sessions.id_formateur");
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Session();
        $data->date_debut=$request->date_debut;
        $data->date_fun=$request->date_fun; 
        $data->nbd_place=$request->nbd_place;
        $data->id_formation=$request->id_formation;
        $data->id_formateur=$request->id_formateur;
        $data->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session=DB::select("select sessions.*,formations.titre,formateurs.nom,formateurs.prenom
        from sessions,formations,formateurs where sessions.id_formation=formations.id and formateurs.id=sessions.id_formateur and sessions.id=$id");
        return response()->json($session);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Session::find($id);
        if(!empty($request->date_debut))
        $data->date_debut=$request->date_debut;
        if(!empty($request->date_fun))
        $data->date_fun=$request->date_fun;
        if(!empty($request->nbd_place)) 
        $data->nbd_place=$request->nbd_place;
        if(!empty($request->id_formation))
        $data->id_formation=$request->id_formation;
        if(!empty($request->id_formateur))
        $data->id_formateur=$request->id_formateur;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Session::find($id)->delete();
    }
    public function sessionmembres(string $id){
        $membres = Membre::where('id_session', $id)
                ->join('utilisateurs', 'membres.iduser', '=', 'utilisateurs.id')
                ->join('inscriptions', 'membres.id', '=', 'inscriptions.id_membre')
                ->get(['membres.*', 'utilisateurs.email']);

    return response()->json($membres);
    }
    public function sessionvotes(string $id){
        $data=DB::select("select * from votes where id_session ={$id}");
        return response()->json($data);

    }
}
