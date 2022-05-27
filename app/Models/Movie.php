<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'launching_date',
        'producer',
    ];

    public function movie_authors()
    {
        return $this->hasMany(MovieAuthor::class)->with('author');
    }

    public function movie_categories()
    {
        return $this->hasMany(MovieCategorie::class)->with('categorie');
    }
}
