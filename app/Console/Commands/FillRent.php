<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Movie;
use App\Rent;
use Carbon\Carbon;

class FillRent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Fill:Rent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command from scheduler which fills rents';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        for ($i=1; $i <= 3; $i++) {
            $dtg = Carbon::createFromTime(20, 00, 00, 'Europe/Kiev')->addDays($i);

            //TODO: nned to find method for random films
            $movie = Movie::find($i);
            $rentArr['movie_id'] = $movie->id;
            $rentArr['dtg'] = $dtg;
            $rentArr['status'] = 1;
            $rentArr['hall'] = 1;
            $rent = Rent::create($rentArr);
        }
    }
}
