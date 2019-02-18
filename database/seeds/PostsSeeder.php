<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('posts')->insert([
			'title' => 'Title 1',
			'body' => 'Lorem ipsum',
			'user_id' => 2,
			'published' => true,
			'created_at' => Carbon::now(),
		]);

		DB::table('posts')->insert([
			'title' => 'Title 2',
			'body' => 'Lorem ipsum',
			'user_id' => 2,
			'created_at' => Carbon::now(),
		]);
	}
}
