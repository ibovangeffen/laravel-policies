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
		// Seeding User role
		DB::table('policy_role')->insert([
			'role_id' => 1,
			'policy_id' => 1,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 1,
			'policy_id' => 8,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 1,
			'policy_id' => 9,
		]);

		// Seeding author role
		DB::table('policy_role')->insert([
			'role_id' => 2,
			'policy_id' => 1,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 2,
			'policy_id' => 2,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 2,
			'policy_id' => 3,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 2,
			'policy_id' => 8,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 2,
			'policy_id' => 9,
		]);

		// Seeding editor role
		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 1,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 3,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 4,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 5,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 8,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 9,
		]);

		DB::table('policy_role')->insert([
			'role_id' => 3,
			'policy_id' => 10,
		]);
	}
}
