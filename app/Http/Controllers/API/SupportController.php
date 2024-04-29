<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use DB;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::select("select supports.*,formations.titre as formation from supports,formations where supports.id_formation=formations.id");
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $support=new Support();
        $support->titre=$request->titre;
        if ($request->hasFile('fichier')) {
            $fichier = $request->file('fichier');
            $fileName = time() . '_' . $fichier->getClientOriginalName();
            $fichier->move(public_path('/Support'), $fileName);
            $support->fichier = $fileName;
        }
        $support->id_formation=$request->id_formation;
        $support->save();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Trouver l'entrée dans la base de données
    $support = Support::find($id);

    // Vérifier si le support existe
    if($support) {
        // Supprimer le fichier associé s'il existe
        if(file_exists(public_path('/Support/' . $support->fichier))) {
            unlink(public_path('/Support/' . $support->fichier));
        }

        // Supprimer l'entrée de la base de données
        $support->delete();

        return "Le support a été supprimé avec succès.";
    } else {
        return "Le support que vous essayez de supprimer n'existe pas.";
    }
}


}
