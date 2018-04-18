<?php

namespace App\System\Models;

class Ticket extends Model
{
    public $timestamps = false;
    
    public function rent()
    {
        return $this->belongsTo('App\Rent');
    }
}
