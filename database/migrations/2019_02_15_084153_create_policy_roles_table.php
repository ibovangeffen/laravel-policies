<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_role', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('policy_id');
            $table->unsignedInteger('role_id');
			$table->foreign('policy_id')->references('id')->on('policies');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unique(['policy_id', 'role_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_roles');
    }
}
