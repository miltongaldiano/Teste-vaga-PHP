<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Models\User;
use App\Repositories\Contracts\MovieRepositoryInterface;

use App\Traits\RequestTrait;

class MovieRepository implements MovieRepositoryInterface
{
    use RequestTrait;

    protected $movie;
    protected $page;
    
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
        $this->page = 1;
    }

    public function list()
    {
        return $this->movie->get();
    }

    public function store()
    {
        try {

            $movies = $this->movies('movie/top_rated', $this->page);

            if(count($movies['results']))
            {

                $insert = $this->movie->insert($movies['results']);
                
                if($insert)
                {
                    $this->page = (int)$movies['page'] + 1;
                    
                    if($this->page < (int)$movies['total_pages'])
                    {
                        $this->store();
                    }

                    return response()->json([
                        'message' => 'Filmes importados com sucesso!',
                    ], 200);

                }
            
            }

        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Filmes não importados!',
            ], 500);

        }

    }
}
?>