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
        $policies = [
            'post' => [
                'view', 'create', 'update', 'delete', 'publish', 'view-drafts'
            ],
            'policy' => [
                'update', 'delete'
            ],
            'comment' => [
                'view', 'create', 'delete'
            ],
        ];

        foreach ($policies as $model => $actions) {
            foreach ($actions as $action) {
                DB::table('policies')->insert([
                    'model' => $model,
                    'action' => $action,
                ]);
            }
        }
    }
}
