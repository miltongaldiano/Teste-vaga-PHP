<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{

    protected $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function favoriteMovie($request)
    {
        try {

            $favorite = $this->user->favoriteMovie($request->movie_id);

            if(count($favorite['attached']))
            {
                return response()->json([
                    'message' => 'Filme adicionado com sucesso!',
                ], 200);
            }

            return response()->json([
                'message' => 'Filme já adicionado!',
            ], 200);

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

}
?>