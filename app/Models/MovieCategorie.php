<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'movie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
