<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',50);
            $table->string('display_name',150);
            $table->string('module');
            $table->timestamps();
        });

        Schema::create('role_permissions',function(Blueprint $table){
            $table->primary(['roles_id','permissions_id']);
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('permissions_id');
            $table->timestamps();

            $table->foreign('roles_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');

            $table->foreign('permissions_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
