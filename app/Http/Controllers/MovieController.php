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

    public function index()
    {
        return $this->movie->list();
    }

    public function store()
    {
        return $this->movie->store();
    }
}
