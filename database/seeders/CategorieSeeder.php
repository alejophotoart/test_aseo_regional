<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'name' => "Accion"
        ]);
        
        Categorie::create([
            'name' => "Comedia"
        ]);

        Categorie::create([
            'name' => "Drama"
        ]);

        Categorie::create([
            'name' => "Suspenso"
        ]);

        Categorie::create([
            'name' => "Terror"
        ]);

        Categorie::create([
            'name' => "Thriller"
        ]);

        Categorie::create([
            'name' => "Romatico"
        ]);

        Categorie::create([
            'name' => "Animado"
        ]);
    }
}
