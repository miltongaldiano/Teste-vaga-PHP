<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\ReturnTrait;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{

    use ReturnTrait;

    protected $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function deleteFavoriteMovie(int $movieId)
    {
        try {
            
            $deletedIt = $this->user->deleteFavoriteMovie($movieId);

            return $this->returnSuccess(
                $deletedIt,
                'Filme removido com sucesso!',
                'Filme já removido!'
            );

        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Filme não removido!',
            ], 500);

        }

        
    }

    public function favoriteMovie(Request $request)
    {
        try {

            $favorite = $this->user->favoriteMovie($request->movie_id);

            return $this->returnSuccess(
                count($favorite['attached']),
                'Filme adicionado com sucesso!',
                'Filme já adicionado!'
            );


        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Filme não adicionado!',
            ], 500);

        }

        
    }

    public function movies()
    {
        return Auth::user()->movies;
    }

    public function store(Request $request)
    {

        $user = $this->user->store($request);

        return $this->returnSuccess(
            $user,
            'Usuário criado com sucesso!'
        );

    }

}
?>