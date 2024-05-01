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
    'email' => 'required|string|email|max:255|unique:utilisateurs', // Vérifie que l'email est unique dans la table utilisateurs
    'tel' => 'required|string|max:20',
    'password' => 'required|string|min:8',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
], [
    'email.unique' => 'Cet email est déjà utilisé. Veuillez choisir un autre email.',
    'nom.required' => 'Le champ nom est requis.',
    'prenom.required' => 'Le champ prénom est requis.',
    'tel.required' => 'Le champ téléphone est requis.',
    'password.required' => 'Le champ mot de passe est requis.',
    'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
    'email.required' => 'Le champ email est requis.',
    'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
]);


        $existingUser = utilisateur::where('email', $request->email)->first();
        if ($existingUser) {
            // Retourner la vue d'inscription avec un message d'erreur
            return redirect('/register')->withErrors([
                'email' => 'Cet email est déjà utilisé. Veuillez choisir un autre email.',
            ]);
        }

        // Création de l'utilisateur
        $user = utilisateur::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'num_tel' => $request->tel,
            'type' => 2, // Assurez-vous que le champ 'type' est configuré correctement dans votre table
        ]);

        // $imagePath = $request->file('image')->store('Membrespic', 'public');
        // $imageName = basename($imagePath);
        if ($request->hasFile('image')) {
            // Récupérer le fichier image
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('/Membrespic'), $fileName);


        }

// Création du membre correspondant
$membre = Membre::create([
    'nom' => $request->nom,
    'prenom' => $request->prenom,
    'image' => $fileName,
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
