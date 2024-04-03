<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
    public function session(){
        return $this->belongsToMany(Session::class,'inscriptions','id_membre','id_session');
    }
    
}
