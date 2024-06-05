<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['auteur', 'description', 'bien_id'];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
