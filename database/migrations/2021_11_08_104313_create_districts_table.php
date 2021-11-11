<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_district',7);
            $table->string('lib_district',70);
            $table->integer('population_district')->nullable();
            $table->double('superficie_district')->nullable();
            $table->unsignedInteger('departements_id');
            $table->unsignedInteger('district_sanitaires_id');
            $table->timestamps();



            $table->foreign('departements_id')
            ->references('id')
            ->on('departements')
            ->onDelete('cascade');

            $table->foreign('district_sanitaires_id')
            ->references('id')
            ->on('district_sanitaires')
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
        Schema::dropIfExists('districts');
    }
}
