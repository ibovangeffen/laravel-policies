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
            'role_id' => 1,
		]);

		User::create([
			'name' => 'Author',
			'email' => 'author@app.com',
			'password' => bcrypt('password'),
            'role_id' => 2,
		]);

		User::create([
			'name' => 'Editor',
			'email' => 'editor@app.com',
			'password' => bcrypt('password'),
            'role_id' => 3,
		]);

		User::create([
			'name' => 'Admin',
			'email' => 'admin@app.com',
			'password' => bcrypt('password'),
            'role_id' => 4,
		]);

		User::create([
			'name' => 'Ibo',
			'email' => 'ibo@app.com',
			'password' => bcrypt('password'),
            'role_id' => 5,
		]);

		User::create([
			'name' => 'Job',
			'email' => 'job@app.com',
			'password' => bcrypt('password'),
            'role_id' => 6,
		]);
    }
}
