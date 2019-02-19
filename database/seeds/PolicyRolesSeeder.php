<?php

use Illuminate\Database\Seeder;

class PolicyRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $policy_roles = [
            // User role
            1 => [
                1, 9, 10,
            ],

            // Author role
            2 => [
                1, 2, 3, 9, 10
            ],

            // Editor role
            3 => [
                1, 3, 4, 5, 6, 9, 10, 11
            ],

            // Admin role
            4 => [
                7, 8
            ]
        ];

        foreach ($policy_roles as $role => $policies) {
            foreach ($policies as $policy) {
                DB::table('policy_role')->insert([
                    'role_id' => $role,
                    'policy_id' => $policy,
                ]);
            }
        }
    }
}
