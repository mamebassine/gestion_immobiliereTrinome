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
        'admin_id',  
    ];

    // Définir la relation avec les commentaires
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // Définir la relation avec les administrateurs
    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class, 'admin_id');
    }
}
