<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    //Cadastrando o filme favorito do usuário logado
    public function favoriteMovie(Request $request)
    {
        return $this->user->favoriteMovie($request);
    }

    //Removendo o filme favorito do usuário logado
    public function deleteFavoriteMovie($movieId)
    {
        return $this->user->deleteFavoriteMovie($movieId);
    }

    //Listando os filmes favoritos do usuário logado
    public function movies()
    {
        return $this->user->movies();
    }

    //Cadastrando um novo usuário
    public function store(UserPostRequest $request)
    {
        return $this->user->store($request);
    }
}
