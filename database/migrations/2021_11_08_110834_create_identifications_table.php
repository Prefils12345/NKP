<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prenom',70)->nullable();
            $table->string('nom',70);
            $table->string('sexe',2);
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance',150)->nullable();
            $table->unsignedInteger('etat_civils_id');
            $table->unsignedInteger('pays_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('type_identites_id')->nullable();
            $table->string('numero_identite')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone',15)->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('nom_pere',150)->nullable();
            $table->string('nom_mere',150)->nullable();
            $table->string('profession',150)->nullable();
            $table->string('personne_contact',150)->nullable();
            $table->string('telephone_personne_contact',15)->nullable();
            $table->string('identifiant_unique',20);
            $table->string('identifiant_photo')->nullable();
            $table->timestamps();

            $table->foreign('pays_id')->references('id_pays')->on('tr_pays')->onDelete('cascade');
            $table->foreign('etat_civils_id')->references('id')->on('etat_civils')->onDelete('cascade');
            $table->foreign('departements_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('type_identites_id')->references('id')->on('type_identites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifications');
    }
}
