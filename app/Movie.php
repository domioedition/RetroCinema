<?php

namespace App;

class Movie extends Model
{
  public function post()
  {
    return $this->belongsTo(MovieSession::class);
  }
}
