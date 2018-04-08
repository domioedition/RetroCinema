<?php

namespace App;


class Ticket extends Model
{
    public $timestamps = false;



    //TODO: remove this method
    public static function store()
    {

        dd("test");
    }
}
