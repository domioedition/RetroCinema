<?php

namespace App;

class Rent extends Model
{

  public $timestamps = false;
  
  public function getTickets()
  {
    return $this->hasMany('App\Ticket');
  }

  public function movie()
  {
    return $this->belongsTo(Movie::classs);
  }
}
