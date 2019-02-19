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
        $users = [
            [
                'name' => 'User',
                'email' => 'user@app.com',
                'password' => 'password',
                'role_id' => 1,
            ],
            [
                'name' => 'Author',
                'email' => 'author@app.com',
                'password' => 'password',
                'role_id' => 2,
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@app.com',
                'password' => 'password',
                'role_id' => 3,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'password' => 'password',
                'role_id' => 4,
            ],
            [
                'name' => 'Ibo',
                'email' => 'ibo@app.com',
                'password' => 'password',
                'role_id' => 5,
            ],
            [
                'name' => 'Job',
                'email' => 'job@app.com',
                'password' => 'password',
                'role_id' => 6,
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'role_id' => 6,
            ]);
        }
    }
}
