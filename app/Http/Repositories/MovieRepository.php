<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Models\User;
use App\Repositories\Contracts\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    protected $movie;
    
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function list()
    {
        return $this->movie->get();
    }

    public function store()
    {
        return $this->movie->create([$request->all()->toArray()]);
    }
}
?>