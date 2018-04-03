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
            $lipsum = new joshtronic\LoremIpsum();
            $title = $lipsum->words(6);
            $body = $lipsum->words(300);
            DB::table('posts')->insert([
                'title' => $title,
                'body' => $body,
                'user_id' => random_int(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
