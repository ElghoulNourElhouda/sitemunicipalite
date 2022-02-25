<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 10; $i++) { 
    		# code...
    	
    	DB::table('articles')->insert([
            'users_id' => 1,
            'title' => str_random(7),
            'body' => str_random(100),
            'created_at' => '2017-12-20 20:18:00',
            'updated_at' => '2017-12-20 20:18:00',
            'published_at' =>  '2017-12-20 20:18:00',
        ]);
        }
    }
}
