<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictSanitairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_sanitaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_district_sanitaire',10);
            $table->string('lib_district_sanitaire',70);
            $table->unsignedInteger('departements_id');
            $table->timestamps();


            $table->foreign('departements_id')
            ->references('id')
            ->on('departements')
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
        Schema::dropIfExists('district_sanitaires');
    }
}
