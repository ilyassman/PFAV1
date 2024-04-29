<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\utilisateur;
use App\Models\Membre;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données d'inscription
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'tel' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création de l'utilisateur
        $user = utilisateur::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'num_tel' => $request->tel,
            'type' => 0, // Assurez-vous que le champ 'type' est configuré correctement dans votre table
        ]);

        // Création du membre correspondant
        $membre = Membre::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'image' => $request->file('image') ? $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName()) : null,
            'iduser' => $user->id,
        ]);

        if ($user instanceof Authenticatable) {
            Auth::login($user);
        } else {
            // Gérer le cas où $user n'est pas une instance de Illuminate\Contracts\Auth\Authenticatable
            // Cela peut être dû à un problème avec le modèle utilisateur
            // Vous pouvez ajouter des logs ou des messages d'erreur pour le débogage
            // Par exemple :
            logger('User is not an instance of Illuminate\Contracts\Auth\Authenticatable: ' . $user);
            // Redirection ou affichage d'un message d'erreur
        }

        // Redirection après inscription
        return redirect('/profile')->with('success', 'Votre compte a été créé avec succès!');
    }
}
