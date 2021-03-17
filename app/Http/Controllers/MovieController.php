<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Repositories\Contracts\MovieRepositoryInterface;

class MovieController extends Controller
{

    protected $movie;

    public function __construct(MovieRepositoryInterface $movie)
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
