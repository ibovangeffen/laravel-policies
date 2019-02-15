<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name' => 'user',
			'user_id' => 1,
		]);

		DB::table('roles')->insert([
			'name' => 'author',
			'user_id' => 2,
		]);

		DB::table('roles')->insert([
			'name' => 'editor',
			'user_id' => 3,
		]);

		DB::table('roles')->insert([
			'name' => 'admin',
			'user_id' => 4,
		]);
    }
}
