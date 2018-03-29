<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
  public function getTickets()
  {
    return $this->hasMany('App\Ticket');
  }
}
