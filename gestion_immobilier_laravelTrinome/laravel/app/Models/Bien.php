<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = [ // les attibuts
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
}
