<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return response()->json(Vote::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Vote();
        $data->niveau_etoile = $request->niveau_etoile;
        $data->id_membre = $request->id_membre;
        $data->id_session = $request->id_session;
        $data->save();
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
        $data=Vote::find($id);
        if(!empty($request->niveau_etoile))
        $data->niveau_etoile = $request->niveau_etoile;
        if(!empty($request->id_membre))                        
        $data->id_membre = $request->id_membre;
        if(!empty($request->id_session))
        $data->id_session = $request->id_session;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vote::find($id)->delete();
    }
}
