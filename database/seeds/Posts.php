<?php

use Illuminate\Database\Seeder;

class Posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('posts')->insert([
                'title' => str_random(30),
                'body' => str_random(300),
                'user_id' => random_int(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
