<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateur extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom', 'prenom', 'adresse', 'email', 'mot_passe',
    ];

    protected $hidden = [
        'mot_passe', 'remember_token',
    ];

    // Définir le champ mot de passe personnalisé
    public function getAuthPassword()
    {
        return $this->mot_passe;
    }
    public function biens()
    {
        return $this->hasMany(Bien::class, 'admin_id');
    }
}
