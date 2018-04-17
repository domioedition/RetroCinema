<?php

use Illuminate\Database\Seeder;

class Votings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('votings')->insert([
                'movie_id' => 1,
                'votes' => 1,
                'visitor' => '127.0.0.1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 100; $i++) {
            DB::table('votings')->insert([
                'movie_id' => 2,
                'votes' => 1,
                'visitor' => '127.0.0.1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 0; $i < 150; $i++) {
            DB::table('votings')->insert([
                'movie_id' => 3,
                'votes' => 1,
                'visitor' => '127.0.0.1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
