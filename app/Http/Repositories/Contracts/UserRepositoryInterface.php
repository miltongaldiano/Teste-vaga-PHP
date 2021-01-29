<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function deleteFavoriteMovie(int $movieId);

    public function favoriteMovie(Request $request);

    public function movies();

    public function store(Request $request);

}

?>