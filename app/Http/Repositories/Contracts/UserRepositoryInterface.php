<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function deleteFavoriteMovie($request);

    public function favoriteMovie($request);

    public function movies();

}

?>