<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::select("select * from posts");
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|string|max:50',
            'descreption' =>'required|string|max:50',
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->descreption=$request->descreption;
        $post->status=$request->status;
        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $data= DB::select("select * from posts where id={$post->id}");
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->descreption=$request->descreption;
        $post->status=$request->status;
        $post->save();
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
