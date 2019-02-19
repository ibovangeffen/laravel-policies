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
		]);

		DB::table('roles')->insert([
			'name' => 'author',
		]);

		DB::table('roles')->insert([
			'name' => 'editor',
		]);

		DB::table('roles')->insert([
			'name' => 'admin',
		]);
    }
}
