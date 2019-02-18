<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('comments')->insert([
			'title' => 'Comment 1',
			'body' => 'Lorem ipsum',
			'user_id' => 5,
			'post_id' => 1,
			'created_at' => Carbon::now(),
		]);

		DB::table('comments')->insert([
			'title' => 'Comment 2',
			'body' => 'Lorem ipsum',
			'user_id' => 6,
			'post_id' => 1,
			'created_at' => Carbon::now(),
		]);

		DB::table('comments')->insert([
			'title' => 'Comment 3',
			'body' => 'Lorem ipsum',
			'user_id' => 5,
			'post_id' => 1,
			'created_at' => Carbon::now(),
		]);
    }
}
