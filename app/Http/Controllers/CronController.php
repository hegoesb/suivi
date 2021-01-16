<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\GestionDossierEDISRepository;

use App\Models\chantier;
use App\Models\dossier_etape_chantier;
use App\Models\entreprise;

class CronController extends Controller
{
  public function __construct(GestionDossierEDISRepository $GestionDossierEDISRepository)
    {
        $this->GD_EDIS = $GestionDossierEDISRepository;
    }

  //-------------------------
  // View
  //-------------------------


    public function copiePlanChantier()
    {



      $entreprises=entreprise::get();
      foreach ($entreprises as $key_e => $e) {
        $entreprise[$e->id]=$e;
      }

      $chantiers = chantier::where('etape_chantier_id',1)->get();

      $data = $this->GD_EDIS->creerDossier(5,$chantiers[0], $entreprise[1]);

      return view('test', ['test' =>  $data , 'imputs' => '$response->json()', 'comp' => '$response']);

      foreach ($chantiers as $key_c => $chantier) {
        $nom_dossier[$key_c] = $this->GD_EDIS->nomChemin(2, $chantier, $entreprise[$chantier->entreprise_id]);
        $nom_dossier[$key_c]['chantier'] = $chantier;
        # code...
      }


    // $data = Storage::disk('EDIS')->allDirectories($nom_dossier['chemin']);


      return view('test', ['test' =>  $nom_dossier , 'imputs' => '$response->json()', 'comp' => '$response']);
  // //-------------------------
  // // Nextcloud - Suivi dernier plan pour chantier
  // //-------------------------


  // public function suiviDernierPlanNextcloud()
  // {
  //   // $ecrire = fopen('script/Nextcloud.sh',"w");
  //   // ftruncate($ecrire,0);
  //   // fputs($ecrire, "#!/bin/bash\n\n");
  //   // fputs($ecrire, "ls -R ".env('APP_PATH_STORAGE')."\n");
  //   // fclose($ecrire);
  //   // exec('bash script/Nextcloud.sh', $data[0], $data[1]);

  //   $data = Storage::disk('EDIS')->allDirectories('/BDX_312_Etudes-Chantiers');

  //   foreach ($data as $key_d => $d) {
  //     # code...
  //   }

  //   return $data;
  // }


        abort(404);

    }

}
