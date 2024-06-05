<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
<<<<<<< HEAD
=======
    protected $dates = ['date_ajout'];
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
>>>>>>> f4f711b1e94931dd4cd667c3704a0667ed9aea38
    use HasFactory;

    protected $fillable = ['nom', 'categorie', 'image', 'description', 'adresse', 'statut', 'date_ajout'];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
