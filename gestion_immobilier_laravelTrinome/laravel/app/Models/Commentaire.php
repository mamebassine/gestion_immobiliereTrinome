<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'auteur',
        'bien_id',
    ];

    /**
     * Relation avec le bien.
     */
    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
