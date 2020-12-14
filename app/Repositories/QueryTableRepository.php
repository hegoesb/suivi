<?php namespace App\Repositories;

use App\Models\facture;

class QueryTableRepository {

	protected $parametre;

	public function __construct()
	{

	}
  //-------------------------
  // Sauvergader
  //-------------------------

    // Table Facture

    public function save_facture_ajouter($request,$client,$entreprise_id)
    {
      $table = new facture;
      $table->numero           = $request->all()['numero'];
      $table->chantier_id      = $request->all()['chantier_id'];
      $table->type_facture_id     = $request->all()['type_facture_id'];
      $table->collaborateur_id = $request->all()['collaborateur_id'];
      $table->total_ht         = $request->all()['total_ht'];
      $table->total_ttc        = $request->all()['total_ttc'];
      $table->date_creation    = $request->all()['date_creation'];
      $table->date_echeance    = $request->all()['date_echeance'];
      if(isset($request->all()['date_envoie'])){
        $table->date_envoie   = $request->all()['date_envoie'];
      }
      $table->entreprise_id = $entreprise_id->id;
      $table->client_id     = $client->client_id;
      $table->tva           = $request->all()['total_ttc']-$request->all()['total_ht'];
      $table->save();

      return $table;
    }









}
