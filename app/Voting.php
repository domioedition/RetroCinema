<?php

namespace App;

class Voting extends Model
{
    public function mm()
    {
        return $this->hasOne('App\Movie', 'id', 'movie_id');
    }
}
