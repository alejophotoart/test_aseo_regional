<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Author;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\MovieAuthor;
use App\Models\MovieCategorie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with(['movie_authors', 'movie_categories'])->get();
        return view('index')
            ->with('movies', $movies);
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Categorie::all();

        return view('create')
            ->with('authors', $authors)
            ->with('categories', $categories);
    }

    public function store(MovieRequest $request)
    {      
        // dd($request->all());
        $launching_date = $request->launching_date;
        $launching_date = str_replace("/", "-" , $launching_date);
        $launching_date = strtotime($launching_date);
        $launching_date = date("Y-m-d", $launching_date );

        $movie = Movie::create([
            'name' => $request['name'],
            'launching_date' => $launching_date,
            'producer' => $request['producer'],
        ]);

        foreach ($request['categorie_id'] as $categorie) {
            MovieCategorie::create([
                'categorie_id' => $categorie,
                'movie_id' => $movie->id,
            ]);
        }

        foreach ($request['author_id'] as $author) {
            MovieAuthor::create([
                'author_id' => $author,
                'movie_id' => $movie->id,
            ]);
        }

        return response()->json(['message' => 'se agrego la pelicula']);
        
    }

    public function edit($id)
    {

        $movie = Movie::where('id', $id)->with(['movie_authors','movie_categories'])->first();
        $categories = Categorie::get();
        $authors = Author::get();
        $movie_categories = MovieCategorie::get();
        $movie_authors = MovieAuthor::get();

        return view('edit')
            ->with('movie', $movie)
            ->with('authors', $authors)
            ->with('categories', $categories)
            ->with('movie_authors', $movie_authors)
            ->with('movie_categories', $movie_categories);
    }

    public function update(Movie $movie, $id, MovieRequest $request)
    {
        $launching = $request->launching_date;
        $launching = str_replace("/", "-" , $launching);
        $launching = strtotime($launching);
        $launching = date("Y-m-d", $launching );
        
        $movie = Movie::where('id', $id)->first();
        $movie->name = $request->name;
        $movie->launching_date = $launching;
        $movie->producer = $request->producer;
        $movie->update();

        $authors = count($request['author_id']);
        for($i = 0; $i < $authors; $i++){
            if($movie_author = MovieAuthor::where('movie_id', $id)->where('author_id', $request['author_id'][$i])->first()){
                $movie_author->movie_id  = $id;
                $movie_author->author_id = $request['author_id'][$i];
                $movie_author->update();
            }else{
                $movie_auth = new MovieAuthor();
                $movie_auth->movie_id  = $id;
                $movie_auth->author_id = $request['author_id'][$i];
                $movie_auth->save();
            }
        }

        $categories = count($request['categorie_id']);
        for($e = 0; $e < $categories; $e++){
            if( $movie_categorie = MovieCategorie::where('movie_id', $id)->where('categorie_id', $request['categorie_id'][$e])->first() ){
                $movie_categorie->movie_id     = $id;
                $movie_categorie->categorie_id = $request['categorie_id'][$e];
                $movie_categorie->update();
            }else{
                $movie_categ = new MovieCategorie();
                $movie_categ->movie_id     = $id;
                $movie_categ->categorie_id = $request['categorie_id'][$e];
                $movie_categ->save();
            }
        }

        return response()->json(['message' => 'se edito la pelicula']);
    }

    public function destroy($id)
    {
        MovieAuthor::where('movie_id', $id)->delete();
        MovieCategorie::where('movie_id', $id)->delete();
        Movie::where('id', $id)->delete();

        return response()->json(['message' => 'se elimino la pelicula']);
    }
}