<?php

namespace App\System\Models;

class Rent extends Model
{
    public $timestamps = false;
  
  
    /**
     * One to many relationship
     * return all tickets for rent movie
     * @return type
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
  
    /**
     * Get information about movie
     * @return type
     */
    public function movie()
    {
        return $this->hasOne('App\Movie', 'id', 'movie_id');
    }
}
