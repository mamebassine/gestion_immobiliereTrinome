<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_publication',
        'description',
        'auteur',
    ];

    public function bien ()
        {
            return $this->belongsTo(Bien::class);
        }

}

