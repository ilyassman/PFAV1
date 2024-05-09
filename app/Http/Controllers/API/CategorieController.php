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
        $data=DB::select("SELECT f.id, f.titre, f.prix, f.contenue, f.disponibilite, 
        f.langue, f.image, f.niveau, f.prerequis, f.objectif, 
        f.created_at, f.updated_at, f.categ_id, f.programme,
        CASE
            WHEN ROUND(AVG(v.niveau_etoile)) IS NULL THEN 0
            ELSE ROUND(AVG(v.niveau_etoile))
        END AS niveau_etoile
 FROM formations f
 LEFT JOIN votes v ON v.id_formation = f.id
 where f.categ_id=$id
 GROUP BY f.id, f.titre, f.prix, f.contenue, f.disponibilite, 
         f.langue, f.image, f.niveau, f.prerequis, f.objectif, 
         f.created_at, f.updated_at, f.categ_id, f.programme
       ");
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
    public function categoriebyid(string $id){
        $datas=Categorie::find($id);
        return response()->json($datas);
    }
    public function destroy(string $id)
    {
        Categorie::find($id)->delete();
    }
}
