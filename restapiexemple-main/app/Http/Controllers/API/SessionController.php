<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $data=Session::all();
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
        $data->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session=Session::find($id);
        return response()->json($session->formateur()->get());
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
        return response()->json(Session::find($id)->membre()->get());
    }
    public function sessionvotes(string $id){
        $data=DB::select("select * from votes where id_session ={$id}");
        return response()->json($data);

    }
}
