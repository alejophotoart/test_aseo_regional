<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained(); //Foranea de autores
            $table->foreignId('movie_id')->constrained(); //Foranea de movies
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_authors');
    }
}
