<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Membre;
use App\Models\utilisateur;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(utilisateur::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $user=new utilisateur();
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->num_tel=$request->num_tel;
      $user->type=$request->type;
      $user->save();
      return $user->id;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $user = Utilisateur::where('email', $id)->first();
      return  $user;
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $user=utilisateur::find($id);
      $memb = Membre::where('iduser', $id)->first();
      if(!empty($request->email))
      $user->email=$request->email;
      if(!empty($request->password))
      $user->password=Hash::make($request->password);
      if(!empty($request->num_tel))
      $user->num_tel=$request->num_tel;
      if(!empty($request->type))
      $user->type=$request->type;
      if(!empty($request->nom))
      $memb->nom=$request->nom;
      if(!empty($request->prenom))
      $memb->prenom=$request->prenom;
      if(!empty($request->iduser))
      $memb->iduser=$request->iduser;
      $user->save();
      $memb->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        utilisateur::find($id)->delete();
    }
    public function login(string $email,string $pass){
      $values=["email"=> $email,"password"=> $pass];
      if(Auth::attempt($values)) {
       dd(auth()->user()->id);
      }
      else{
        dd("user not found");
      }

    }
}
