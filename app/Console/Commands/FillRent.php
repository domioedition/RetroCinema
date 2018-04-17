<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Movie;
use App\Rent;
use App\Voting;
use Illuminate\Support\Facades\DB;
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
        
        //TODO: here method which calculate votes and create rent movie
        
        
        $votings = DB::table('movies')
                    ->join('votings', 'movies.id', '=', 'votings.movie_id')
                     ->select(DB::raw('count(votings.votes) as votes_total, votings.movie_id, movies.*'))
                     ->orderBy('votes_total', 'desc')
                     ->groupBy('votings.movie_id')
                     ->limit(3)
                     ->get();
        
        
             foreach ($votings as $vote) {
                    $rentMovie['movie_id'] = $vote->id;
                    $rentMovie['dtg'] = Carbon::createFromTime(20, 00, 00, 'Europe/Kiev')->addDays(1);
                    $rentMovie['status'] = 1;
                    $rentMovie['hall'] = 1;

                    Rent::firstOrCreate($rentMovie);
                    
                    //Here we start process cleaning of table voting
                    
//                    dd($vote->id);
                    //TODO: check isset or empty
//                    if(!empty($vote->id)){
                        $clearVotings = Voting::find($vote->id);
                        var_dump($vote->id);
                        //TODO: investigate why here null
                        if(!null($clearVotings)) $clearVotings->delete();                    
//                    }
             }
        
        
//        $quantityMovies = Movie::count();
//        for ($i=1; $i <= $quantityMovies; $i++) {
//            $dtg = Carbon::createFromTime(20, 00, 00, 'Europe/Kiev')->addDays($i);
//
//            //TODO: nned to find method for random films
//            $movie = Movie::find($i);
//            $rentArr['movie_id'] = $movie->id;
//            $rentArr['dtg'] = $dtg;
//            $rentArr['status'] = 1;
//            $rentArr['hall'] = 1;
//            $rent = Rent::create($rentArr);
//        }
    }
}
