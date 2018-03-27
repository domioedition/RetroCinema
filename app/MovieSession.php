<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieSession extends Model
{
    public function getMovieInformation()
    {
      return $this->hasMany(Movie::class);
    }
}
