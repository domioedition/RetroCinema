<?php

namespace App;

class Ticket extends Model
{
    public $timestamps = false;
    
    public function rent()
    {
        return $this->belongsTo('App\Rent');
    }
}
