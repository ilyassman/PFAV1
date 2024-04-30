<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion de l'utilisateur
        if (Auth::attempt($credentials)) {
            // Redirection après connexion réussie
            return redirect('/profile')->with('success', 'Vous êtes maintenant connecté.');
        } else {
            // Retourner la vue de connexion avec les erreurs
            return redirect('/login')->withErrors([
                'email' => 'Adresse e-mail ou mot de passe incorrect.',
            ]);
        }
    }
}
