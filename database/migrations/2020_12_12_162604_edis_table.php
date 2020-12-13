<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //-------------------------
        // Entreprises
        //-------------------------

        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',10);
            $table->string('nom_display',20);
            $table->string('prefixe_chantier',6);
            $table->string('prefixe_devis',15);
            $table->timestamps();
        });

        Schema::create('collaborateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',3);
            $table->string('nom_display',20);
            $table->timestamps();
        });

        //-------------------------
        // Clients
        //-------------------------

        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_client_id')->nullable();
            $table->string('nom',10);
            $table->string('nom_display',40);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('client_entreprise', function (Blueprint $table) {
            $table->integer('client_id')->unsigned();
            $table->integer('entreprise_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        //-------------------------
        // Types
        //-------------------------

        Schema::create('type_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });

        Schema::create('type_devis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });
        Schema::create('type_factures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });
        Schema::create('type_paiements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });

        //-------------------------
        // Etat
        //-------------------------

        Schema::create('etat_chantiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });
        Schema::create('etat_devis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',4);
            $table->string('nom_display',20);
            $table->timestamps();
        });
        //-------------------------
        // Chantier
        //-------------------------

        Schema::create('chantiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifiant',50);
            $table->string('libelle',50)->nullable();
            $table->integer('client_id');
            $table->integer('entreprise_id');
            $table->integer('etat_chantier_id');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('devis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',15);
            $table->string('lot',50)->nullable();
            $table->integer('chantier_id');
            $table->integer('entreprise_id');
            $table->integer('client_id');
            $table->integer('bilan_id');
            $table->integer('etat_devis_id');
            $table->integer('type_devis_id');
            $table->integer('collaborateur_id')->nullable();
            $table->float('total_ht', 10, 2)->nullable();
            $table->float('total_ttc', 10, 2)->nullable();
            $table->float('tva', 10, 2)->nullable();
            $table->boolean('progbox_sauve')->nullable();
            $table->date('date_creation');
            $table->date('date_signature')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


        //-------------------------
        // paiements
        //-------------------------

        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',4);
            $table->integer('chantier_id');
            $table->integer('client_id');
            $table->integer('bilan_id');
            $table->integer('entreprise_id');
            $table->integer('type_facture_id');
            $table->float('valeur', 10, 2)->nullable();
            $table->float('tva', 10, 2)->nullable();
            $table->integer('collaborateur_id')->nullable();
            $table->date('date_echeance');
            $table->date('date_envoie')->nullable();
            $table->integer('type_reglement_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_releve_compte',4);
            $table->integer('chantier_id');
            $table->integer('client_id');
            $table->integer('bilan_id');
            $table->integer('entreprise_id');
            $table->float('valeur', 10, 2)->nullable();
            $table->float('tva', 10, 2)->nullable();
            $table->integer('collaborateur_id')->nullable();
            $table->date('date_echeance');
            $table->date('date_envoie')->nullable();
            $table->integer('type_facture_id')->nullable();
            $table->integer('type_reglement_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('paiement_facture', function (Blueprint $table) {
            $table->integer('paiement_id')->unsigned();
            $table->integer('facture_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //-------------------------
        // Entreprises
        //-------------------------

        Schema::dropIfExists('entreprises');
        Schema::dropIfExists('collaborateurs');

        //-------------------------
        // Clients
        //-------------------------

        Schema::dropIfExists('clients');
        Schema::dropIfExists('client_entreprise');

        //-------------------------
        // Types
        //-------------------------

        Schema::dropIfExists('type_clients');
        Schema::dropIfExists('type_devis');
        Schema::dropIfExists('type_factures');
        Schema::dropIfExists('type_paiements');

        //-------------------------
        // Etat
        //-------------------------

        Schema::dropIfExists('etat_chantiers');
        Schema::dropIfExists('etat_devis');

        //-------------------------
        // Chantier
        //-------------------------

        Schema::dropIfExists('chantiers');
        Schema::dropIfExists('devis');

        //-------------------------
        // paiements
        //-------------------------

        Schema::dropIfExists('factures');
        Schema::dropIfExists('paiements');
        Schema::dropIfExists('paiement_facture');

    }
}
