<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function favoriteMovie($request);

    public function movies();

}

?>