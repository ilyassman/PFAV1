<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation; // Assurez-vous d'importer le modèle de Formation

class CourseSingleController extends Controller
{
    public function show(Request $request)
{
    $formationId = $request->input('id');

    // Rechercher la formation dans la base de données
    $formation = Formation::find($formationId);

    // Vérifier si la formation est trouvée
    if (!$formation) {
        // Si la formation n'est pas trouvée, retourner une réponse avec un statut 404
        return response()->json(['message' => 'Formation non trouvée.'], 404);
    }

    // Passer les données à la vue course-single.blade.php
    return view('course-single', compact('formation')); // Utilisation de compact pour passer la variable $formation à la vue
}


}
