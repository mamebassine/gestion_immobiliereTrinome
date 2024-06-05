<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{

    protected $dates = ['date_ajout'];
    protected $fillable = [ 
        'nom',
        'image',
        'categorie',
        'text',
        'description',
        'adresse',
        'statut',
        'date_ajout',
    ];

    use HasFactory;

   
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
