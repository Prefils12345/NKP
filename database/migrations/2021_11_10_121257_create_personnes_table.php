<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_personne', function (Blueprint $table) {
            $table->bigIncrements('id_personne');
            $table->string('numero_personne')->nullable();
            $table->string('prenom_personne',70)->nullable();
            $table->string('nom_personne',70);
            $table->string('nom_jeune_fille',70)->nullable();
            $table->string('sexe',2);
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance',150)->nullable();
            $table->unsignedInteger('id_pays')->nullable();
            $table->string('nom_pere',150)->nullable();
            $table->string('nom_mere',150)->nullable();
            $table->string('profession',150)->nullable();
            $table->string('nom_prenom_personne_contact',150)->nullable();
            $table->string('telephone_personne_contact',15)->nullable()->unique();
            $table->string('email_personne_contact')->nullable()->unique();
            $table->string('num_piece_identite_personne_contat',15)->nullable();
            $table->string('annee_naissance_personne',15)->nullable();
            $table->string('identifiant_photo')->nullable();
            $table->timestamps();

            $table->foreign('id_pays')->references('id_pays')->on('tr_pays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_personne');
    }
}
