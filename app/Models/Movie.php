<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    public $incrementing = false;

    protected $fillable = [
        'movie_db_id',
        'imdb_id',
        'title',
        'original_language',
        'overview',
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
