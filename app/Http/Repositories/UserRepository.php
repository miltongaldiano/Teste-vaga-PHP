<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function movies()
    {
        return $this->user->movies;
    }
}
?>