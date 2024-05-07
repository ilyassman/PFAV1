<?php

namespace App\Http\Controllers;

use App\Mail\InscriMail;
use Illuminate\Http\Request;
use Mail;

class Mailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Mail::to("bouleknadelabderrahmane33@gmail.com")
        ->send(new InscriMail());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
