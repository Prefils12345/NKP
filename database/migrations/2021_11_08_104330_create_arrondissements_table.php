<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrondissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrondissements', function (Blueprint $table) {
            $table->id();
            $table->string('code_arrondissement',7);
            $table->string('lib_arrondissement',70);
            $table->integer('population_arrondissement')->nullable();
            $table->double('superficie_arrondissement')->nullable();
            $table->unsignedInteger('communes_id');
            $table->unsignedInteger('district_sanitaires_id');
            $table->timestamps();


            $table->foreign('communes_id')
            ->references('id')
            ->on('communes')
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
        Schema::dropIfExists('arrondissements');
    }
}
