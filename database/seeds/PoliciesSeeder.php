<?php

use Illuminate\Database\Seeder;

class PoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'view',
		]);

        DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'create',
		]);

		DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'update',
		]);

		DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'delete',
		]);

		DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'publish',
		]);

		DB::table('policies')->insert([
			'model' => 'post',
			'action' => 'view-drafts',
		]);

		DB::table('policies')->insert([
			'model' => 'policy',
			'action' => 'update',
		]);
    }
}
