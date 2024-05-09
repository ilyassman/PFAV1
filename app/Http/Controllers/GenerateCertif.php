<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Formation;
use App\Models\Membre;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateCertif extends Controller
{
    public function Certifgenerat(Request $request){
        $membre=Membre::where('iduser',Auth::id())->first();
        $ecole=Ecole::all()->first();
        $id=$request->input('id');
        $formation=Formation::find($id);
        $data=[
            'title'=>"certif",
            'date' => date('m/d/Y'),
            'membre'=>$membre,
            'ecole'=>$ecole,
            'formation'=>$formation
            
            
        ];
        $pdf = PDF::loadView('certif', $data);
        return $pdf->download('Certificat.pdf');
    }
}
