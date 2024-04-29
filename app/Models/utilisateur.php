<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class utilisateur extends Model
{
    protected $fillable = [
        'email', // Ajoutez 'email' à la liste des attributs fillable
        'password',
        'num_tel',
        'type',
        // Ajoutez ici d'autres attributs que vous souhaitez permettre pour l'assignation en masse
    ];
    use HasFactory;
}
