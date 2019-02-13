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
			'name' => 'Admin',
			'email' => 'admin@app.com',
			'password' => bcrypt('password'),
			'role_id' => 2,
		]);

//		User::create([
//			'name' => 'Admin',
//			'email' => 'admin@app.com',
//			'password' => bcrypt('password'),
//			'role' => 'admin',
//		]);
    }
}
