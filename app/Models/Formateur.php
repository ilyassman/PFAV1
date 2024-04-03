<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    public function session(){
        return $this->belongsToMany(Session::class,'formateur_sessions','id_formateur','id_session');
    }
}
