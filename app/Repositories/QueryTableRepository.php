<?php namespace App\Repositories;

use App\Models\devi_facture;
use App\Models\devi;
use App\Models\facture;
use App\Models\facture_paiement;
use App\Models\paiement;

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
      if(isset($request->all()['retenuegarantie_ht'])){
        $table->retenuegarantie_ht  = $request->all()['retenuegarantie_ht'];

      }
      $table->entreprise_id = $entreprise_id->id;
      $table->tva           = $request->all()['total_ttc']-$request->all()['total_ht'];
      $table->save();

      return $table;
    }

    public function save_devi_facture($devi_request,$facture_id)
    {
      $i=0;
      foreach ($devi_request as $key => $value) {
        if($i==0){
          //sauvegarde de l'id ud client
          $devis = devi::where('id',$key)->first();
          facture::where('id',$facture_id)->update(['client_id' => $devis->client_id]);
          $i++;
        }

        $table = new devi_facture;
        $table->devi_id    = $key;
        $table->facture_id = $facture_id;
        $table->save();
      }
      return $table;
    }

    // Table paiement

    public function save_paiement_ajouter($request,$entreprise_id)
    {
      //Sauvergarde de la facture
      $table = new paiement;
      $table->numero_releve_compte = $request->all()['numero_releve_compte'];
      $table->valeur_ttc           = $request->all()['valeur_ttc'];
      $table->type_paiement_id     = $request->all()['type_paiement_id'];
      $table->entreprise_id        = $entreprise_id->id;
      $table->client_id            = $request->all()['client_id'];
      $table->date_paye            = $request->all()['date_paye'];
      $table->save();

      return $table;
    }

    public function save_facture_paiement($facture_request,$paiement_id)
    {
      foreach ($facture_request as $key => $value) {
        $table = new facture_paiement;
        $table->facture_id    = $key;
        $table->paiement_id = $paiement_id;
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

    public function delete_facture_paiementId($paiement_id)
    {
      $table = facture_paiement::where('paiement_id',$paiement_id)->delete();
      return $table;
    }


}
