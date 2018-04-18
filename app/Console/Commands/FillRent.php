<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\System\Models\Movie;
use App\System\Models\Rent;
use App\System\Models\Voting;
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
     * Here method which calculate votes and create rent movie
     *
     * @return mixed
     */
    public function handle()
    {
        //here method which calculate votes and create rent movie
        $votings = DB::table('movies')
                    ->join('votings', 'movies.id', '=', 'votings.movie_id')
                     ->select(DB::raw('count(votings.votes) as votes_total, votings.movie_id, movies.*'))
                     ->orderBy('votes_total', 'desc')
                     ->groupBy('votings.movie_id')
                     ->limit(3)
                     ->get();

        $quantityMovies = count($votings);
        for ($i=0; $i < $quantityMovies; $i++) {
            $rentMovie['movie_id'] = $votings[$i]->id;
            $rentMovie['dtg'] = Carbon::createFromTime(20, 00, 00, 'Europe/Kiev')->addDays($i);
            $rentMovie['status'] = 1;
            $rentMovie['hall'] = 1;

            //Adding new movie to rent table
            Rent::firstOrCreate($rentMovie);

            //Here we start process cleaning of table voting
            Voting::where('movie_id', $votings[$i]->id)->delete();

            //Changing status film to non active
            Movie::where('id', $votings[$i]->id)->update(['active' => 0]);
        }
    }
}
