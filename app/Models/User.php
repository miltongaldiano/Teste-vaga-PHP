<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deleteFavoriteMovie($movieId)
    {
        if(!$movieId)
        {
            return false;
        }

        return Auth::user()->movies()->detach($movieId);

    }

    public function favoriteMovie($movieId)
    {

        return Auth::user()->movies()->syncWithoutDetaching($movieId);

    }

    public function movies()
    {

        return $this->belongsToMany(Movie::class)->withTimestamps();

    }

    public function store($request)
    {
        
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = Hash::make($request->password);
        
        return $this->save();

    }
}
