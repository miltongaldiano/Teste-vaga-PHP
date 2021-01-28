<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'movie_db_id',
        'title',
        'original_language',
        'overview'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function insert($movies)
    {
        if($movies)
        {
            foreach ($movies as $movie) {

                $this->updateOrCreate(
                    [
                        'movie_db_id' => $movie['id']
                    ],
                    [
                        'movie_db_id' => $movie['id'],
                        'title' => $movie['title'],
                        'original_language' => $movie['original_language'],
                        'overview' => $movie['overview']
                    ]
                );
            }

            return true;
        }

        return false;
    }

}
