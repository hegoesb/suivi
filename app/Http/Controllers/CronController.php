<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\GestionDossierEDISRepository;
use App\Repositories\TraitementRepository;

use App\Models\chantier;
use App\Models\dossier_etape_chantier;
use App\Models\entreprise;
use App\Models\sousdossier;

class CronController extends Controller
{
  public function __construct(GestionDossierEDISRepository $GestionDossierEDISRepository,TraitementRepository $TraitementRepository)
    {
        $this->GD_EDIS              = $GestionDossierEDISRepository;
        $this->TraitementRepository = $TraitementRepository;
    }

  //-------------------------
  // View
  //-------------------------


    public function copiePlanChantier()
    {

      $dosssiers['dossier_plan_etude']=2;
      $dosssiers['dossier_plan_chantier']=5;

      $sousdossier = sousdossier::where('id',2)->orWhere('id',4)->get();

      $entreprises=entreprise::get();
      foreach ($entreprises as $key_e => $e) {
        $entreprise[$e->id]=$e;
      }

      $chantiers = chantier::where('etape_chantier_id',3)->get();

      if(isset($chantiers[0])){
        // return view('test', ['test' =>  $data , 'imputs' => '$response->json()', 'comp' => '$response']);
        foreach ($chantiers as $key_c => $chantier) {
          foreach ($dosssiers as $key_d => $dossier_id) { //Boucle dossier études et dossier chantier
            foreach ($sousdossier as $key_sd => $sd) { //Boiucle dossier plan
              $chemin = $this->GD_EDIS->nomChemin($dossier_id, $chantier, $entreprise[$chantier->entreprise_id])['chemin'].'/'.$sd->libelle;
              $fichiers = Storage::disk('EDIS')->allFiles($chemin);
              // $nom_dossier[$key_c][$key_d][$key_sd]['chemin'] = $this->GD_EDIS->nomChemin($dossier_id, $chantier, $entreprise[$chantier->entreprise_id])['chemin'].'/'.$sd->libelle;
              // $array_nom_fichier = null;
              $nom_dossier[$key_c][$key_d][$key_sd]['fichier'] = Storage::disk('EDIS')->allFiles($chemin);
              if(!empty($fichiers)){
                foreach ($fichiers as $key_f => $fichier) {
                  //Suppression du chemin
                  $array_fichiers[$key_f] = str_replace($chemin.'/', "",$fichier);
                  // sépartion version

                  // $explode_version = str_split($explode_fichiers[3]);



        // return view('test', 'test' =>  $explode_version, 'imputs' => '$array_explode_fichiers', 'comp' => '$array_sort']);

                  // $explode_fichiers[$key_c][$key_f]

              // $fichiers2[$key_c] = Storage::disk('EDIS')->allFiles($chemin.'/'.$explode_fichiers[0].'_'.);

                  // $array_chemin_fichier[$chantier->id][$key_d] = explode("/", $fichier);
                  // $array_nom_fichier[$chantier->id][$key_d] = explode("/", $fichier);
              // $fichiers = Storage::disk('EDIS')->allFiles($chemin);


                }

                $data = $this->TraitementRepository->triVersionPlan($array_fichiers);

        return view('test', ['test' =>  $array_fichiers, 'imputs' => $data, 'comp' => '$array_sort']);

                //Tri par version
                $version = array_column($explode_fichiers[$key_c], 3);
                $array_sort[$key_c] = array_multisort($version, SORT_DESC,$explode_fichiers[$key_c]);


              }

              # code...
            }
          }
        }
        return view('test', ['test' =>  $explode_fichiers, 'imputs' => $array_explode_fichiers, 'comp' => $array_sort]);
      }




    // $data = Storage::disk('EDIS')->allDirectories($nom_dossier['chemin']);


      return view('test', ['test' =>  '$nom_dossier ', 'imputs' => '$response->json()', 'comp' => '$response']);
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
