<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Repositories\MovieRepository;

class MovieController extends Controller
{

    protected $movie;

    public function __construct(MovieRepository $movie)
    {
        $this->movie = $movie;
    }

    //Listando os filmes
    public function index()
    {
        return $this->movie->list();
    }
    
    //Importando os filmes: command: php artisan import:movies
    public function store()
    {
        return $this->movie->store();
    }
}
