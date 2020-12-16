<?php namespace App\Repositories;

use App\Models\devi_facture;
use App\Models\devi;
use App\Models\facture;
use App\Models\retenuegarantie;

class QueryTableRepository {

	protected $parametre;

	public function __construct()
	{

	}

  //-------------------------
  // Sauvergader
  //-------------------------

    // Table Facture

    public function save_facture_ajouter($request,$entreprise_id)
    {
      //Sauvergarde de la facture
      $table = new facture;
      $table->numero           = $request->all()['numero'];
      $table->chantier_id      = $request->all()['chantier_id'];
      $table->type_facture_id  = $request->all()['type_facture_id'];
      $table->collaborateur_id = $request->all()['collaborateur_id'];
      $table->total_ht         = $request->all()['total_ht'];
      $table->total_ttc        = $request->all()['total_ttc'];
      $table->date_creation    = $request->all()['date_creation'];
      $table->date_echeance    = $request->all()['date_echeance'];
      if(isset($request->all()['date_envoie'])){
        $table->date_envoie   = $request->all()['date_envoie'];
      }
      $table->entreprise_id = $entreprise_id->id;
      $table->tva           = $request->all()['total_ttc']-$request->all()['total_ht'];
      $table->save();

      //Sauvergarde de la retenue de garnatie si elle existe
      if(isset($request->all()['valeur_rg'])){
        $RG = new retenuegarantie;
        $RG->facture_id       = $table->id;
        $RG->total_ht         = $request->all()['valeur_rg'];
        $RG->save();

        facture::where('id',$table->id)->update(['retenuegarantie_id' => $RG->id]);
      }

      return $table;
    }

    public function save_devi_facture($devi_request,$facture_id)
    {
      $i=0;
      foreach ($devi_request as $key => $value) {
        if($i==0){
          //sauvegarde de l'id ud client
          $devis = devi::where('id',$key)->first();
          facture::where('id',$facture_id)->update('client_id',$devis->client_id);
          $i++;
        }

        $save_client_id
        $table = new devi_facture;
        $table->devi_id    = $key;
        $table->facture_id = $facture_id;
        $table->save();
      }
      return $table;
    }


  //-------------------------
  // effacer table
  //-------------------------

    public function delete_devi_factureId($facture_id)
    {
      $table = devi_facture::where('facture_id',$facture_id)->delete();
      return $table;
    }



}
