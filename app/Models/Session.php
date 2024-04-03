<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public function formateur(){
        return $this->belongsToMany(Formateur::class,'formateur_sessions','id_session','id_formateur');
    }
    public function membre(){
        return $this->belongsToMany(Membre::class,'inscriptions','id_session','id_membre');
    }
}
