<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::create([
			'name' => 'User',
			'email' => 'user@app.com',
			'password' => bcrypt('password'),
		]);

		User::create([
			'name' => 'Editor',
			'email' => 'editor@app.com',
			'password' => bcrypt('password'),
		]);

		User::create([
			'name' => 'Admin',
			'email' => 'admin@app.com',
			'password' => bcrypt('password'),
		]);
    }
}
