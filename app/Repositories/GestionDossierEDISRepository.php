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
  // Entreprise
  //-------------------------

  public function creerDossier($value,$table,$chantier, $entreprise)
  {
    $dossier = dossier::where('id',$value)->first();
    $sousdossier = sousdossier::where('dossier_id',$dossier->id)->get();
    $client = client::where('id',$chantier->client_id)->first();

    $nom_dossier = $entreprise->prefixe_dossier.'_'.$dossier->numero.'_'.$dossier->libelle.'/'.$chantier->identifiant.'_'.$client->nom.'_'.$chantier->nom;

    foreach ($sousdossier as $key => $sd) {
      $root_dossier[$key]=$nom_dossier.'/'.$sd->libelle;
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


