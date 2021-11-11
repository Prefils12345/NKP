<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeIdentitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_identites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_type_piece_identite',10);
            $table->string('lib_type_piece_identite',50);
            $table->string('lib_court_type_piece_identite',5);
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
        Schema::dropIfExists('type_identites');
    }
}
