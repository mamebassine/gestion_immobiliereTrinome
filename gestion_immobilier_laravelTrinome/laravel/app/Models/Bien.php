<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $dates = ['date_ajout'];
    protected $fillable = [
        'nom',
        'image',
        'categorie',
        'description',
        'adresse',
        'statut',
        'date_ajout',
    ];

    /**
     * Relation avec les commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
