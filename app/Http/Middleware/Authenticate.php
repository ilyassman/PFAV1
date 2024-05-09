<?php

namespace App\Http\Middleware;

use App\Models\utilisateur;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->expectsJson()){
            //$user= utilisateur::find(Auth::id());
            //if($user->type==0)
               // return redirect('/admin');


            // Redirection après connexion réussie
            //return redirect('/profile')->with('success', 'Vous êtes maintenant connecté.');
        }
        else {
            return route('login');
        }
        //return $request->expectsJson() ? null : route('login');

    }
}
