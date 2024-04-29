<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model

{
    protected $fillable = [
        'nom', // Ajoutez 'nom' à la liste des attributs fillable
        'prenom',
        'image',
        'iduser',
        // Ajoutez ici d'autres attributs que vous souhaitez permettre pour l'assignation en masse
    ];

    use HasFactory;

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'inscriptions', 'id_membre', 'id_session');
    }
}
