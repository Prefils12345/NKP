<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_pays', function (Blueprint $table) {
            $table->increments('id_pays');
            $table->string('code_pays',7);
            $table->string('lib_pays_fr',70);
            $table->string('lib_pays_eng',70);
            $table->string('numero_pays',5);
            $table->string('code_alpha2',5);
            $table->string('code_alpha3',5);
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
        Schema::dropIfExists('tr_pays');
    }
}
