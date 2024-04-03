<?php

namespace App\Http\Controllers;
use App\Models\Formation;


use Illuminate\Http\Request;

class CourseController extends Controller
{
   /* public function show($id)
    {
        // Récupérer les données de la formation correspondante depuis la base de données
        $formation = Formation::findOrFail($id);

        // Passer les données de la formation à la vue pour l'affichage
        return view('course-single', compact('formation'));
    }*/
    public function showCourse(Request $request)
{
    $formationId = $request->query('id');
    $formation = Formation::find($formationId); 

    return view('course-single', ['formation' => $formation]);
}

}
