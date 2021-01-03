<?php namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

use App\Models\client;
use App\Models\dossier;
use App\Models\sousdossier;

class GestionDossierEDISRepository {

	protected $parametre;

	public function __construct()
	{

	}

   //-------------------------
  // Nom
  //-------------------------

  public function nomDossier($value, $entreprise)
  {
    $dossier = dossier::where('id',$value)->first();
    $data  = $entreprise->prefixe_dossier.'_'.$dossier->numero.'_'.$dossier->libelle;
    return $data;
  }

  public function nomProjet($chantier)
  {
    $client = client::where('id',$chantier->client_id)->first();
    $data  = $chantier->identifiant.'_'.$client->nom.'_'.$chantier->nom;
    return $data;
  }

  //-------------------------
  // Action
  //-------------------------


  public function creerDossier($value,$chantier, $entreprise)
  {
    $dossier     = dossier::where('id',$value)->first();
    $sousdossier = sousdossier::where('dossier_id',$dossier->id)->get();

    $nom_dossier = $this->nomDossier($value, $entreprise);
    $nom_projet  = $this->nomProjet($chantier);

    $chemin = $nom_dossier.'/'.$nom_projet;

    foreach ($sousdossier as $key => $sd) {
      $root_dossier[$key]=$chemin.'/'.$sd->libelle;
    }

    foreach ($root_dossier as $key => $rt) {
      Storage::disk('EDIS')->makeDirectory($rt);
    }

    $data = Storage::disk('EDIS')->allDirectories();

    return $data;
  }

  public function supprimerDossier($value,$table,$chantier,$entreprise)
  {
    $dossier = dossier::where('id',$value)->first();
    $client = client::where('id',$chantier->client_id)->first();

    $nom_dossier = $entreprise->prefixe_dossier.'_'.$dossier->numero.'_'.$dossier->libelle.'/'.$chantier->identifiant.'_'.$client->nom.'_'.$chantier->nom;

    Storage::disk('EDIS')->deleteDirectory($nom_dossier);

    $data = Storage::disk('EDIS')->allDirectories();

    return $data;
  }

}


