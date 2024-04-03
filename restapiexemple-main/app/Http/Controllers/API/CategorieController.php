<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\Request;
use DB;
class CategorieController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::with('formation')->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Categorie();
        $data->nom=$request->nom;
        $data->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=DB::select("select f.*,niveau_etoile from formations f,votes v,sessions s 
        where f.id=s.id_formation and f.categ_id=$id");
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Categorie::find($id);
        $data->nom=$request->nom;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorie::find($id)->delete();
    }
}
