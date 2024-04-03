<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    public function session(){
        return $this->hasMany(Session::class,'id_formation');
    }
    public function categ()
    {
        return $this->hasOne(Categorie::class,'categ_id');
    }
}
