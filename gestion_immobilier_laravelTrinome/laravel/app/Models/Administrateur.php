<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    // Définir la relation avec les biens
    public function biens()
    {
        return $this->hasMany(Bien::class, 'admin_id');
    }
}
