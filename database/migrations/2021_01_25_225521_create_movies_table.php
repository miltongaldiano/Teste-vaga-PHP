<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('movie_db_id');
            $table->string('imdb_id', 50);
            $table->string('title', 255);
            $table->string('original_language', 2)->nullable();
            $table->text('overview')->nullable();
            $table->string('status', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('movie_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        //favorite movie
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_user');
        Schema::dropIfExists('movies');
    }
}
