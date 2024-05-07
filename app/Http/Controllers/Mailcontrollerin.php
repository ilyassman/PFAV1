<?php

namespace App\Http\Controllers;

use App\Mail\InscriMail;
use Illuminate\Http\Request;
use Mail;

class Mailcontrollerin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }
    public function sendmail(string $id, Request $request)
{
    $data = [
        'nom' => $request->input('nom'),
        'prenom'=> $request->input('prenom'),
        'pass'=>$request->input('pass'),
        'mail'=>$request->input('mail')
    ];

    Mail::to($id)
        ->send(new InscriMail($data));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {
        
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
        //
    }
}
