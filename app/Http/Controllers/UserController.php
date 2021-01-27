<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;

use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function favoriteMovie(Request $request)
    {
        return $this->user->favoriteMovie($request);
    }

    public function deleteFavoriteMovie($movieId)
    {
        return $this->user->deleteFavoriteMovie($movieId);
    }

    public function movies()
    {
        return $this->user->movies();
    }

    public function store(UserPostRequest $request)
    {
        return $this->user->store($request);
    }
}
