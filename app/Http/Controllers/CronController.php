<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\GestionDossierEDISRepository;
use App\Repositories\TraitementRepository;
use App\Repositories\ScriptRepository;

use App\Models\chantier;
use App\Models\dossier_etape_chantier;
use App\Models\entreprise;
use App\Models\sousdossier;

class CronController extends Controller
{
  public function __construct(GestionDossierEDISRepository $GestionDossierEDISRepository,TraitementRepository $TraitementRepository,ScriptRepository $ScriptRepository)
    {
      $this->GD_EDIS              = $GestionDossierEDISRepository;
      $this->TraitementRepository = $TraitementRepository;
      $this->ScriptRepository     = $ScriptRepository;
    }

  //-------------------------
  // View
  //-------------------------


    public function copiePlanChantier()
    {

      $dossiers['dossier_plan_etude']=2;
      $dossiers['dossier_plan_chantier']=5;

      $sousdossier = sousdossier::where('id',2)->orWhere('id',4)->get();

      $entreprises=entreprise::get();
      foreach ($entreprises as $key_e => $e) {
        $entreprise[$e->id]=$e;
      }

      $chantiers = chantier::where('etape_chantier_id',3)->get();

      if(isset($chantiers[0])){
        // return view('test', ['test' =>  $data , 'imputs' => '$response->json()', 'comp' => '$response']);
        foreach ($chantiers as $key_c => $chantier) {
          // foreach ($dosssiers as $key_d => $dossier_id) { //Boucle dossier études et dossier chantier
            foreach ($sousdossier as $key_sd => $sd) { //Boiucle dossier plan

              //Effacer les documents du dossiers chantiers du projet
              $chemin_chantier = $this->GD_EDIS->nomChemin($dossiers['dossier_plan_chantier'], $chantier, $entreprise[$chantier->entreprise_id])['chemin'].'/'.$sd->libelle;
              $fichiers_a_effacer = Storage::disk('EDIS')->allFiles($chemin_chantier);
              Storage::disk('EDIS')->delete($fichiers_a_effacer);

              $chemin_etude = $this->GD_EDIS->nomChemin($dossiers['dossier_plan_etude'], $chantier, $entreprise[$chantier->entreprise_id])['chemin'].'/'.$sd->libelle;
              $fichiers_etude = Storage::disk('EDIS')->allFiles($chemin_etude);

              if(!empty($fichiers_etude)){
                foreach ($fichiers_etude as $key_fe => $fe) {
                  //Suppression du chemin
                  $array_fichiers[$key_fe] = str_replace($chemin_etude.'/', "",$fe);

                }

                $tri_fichiers = $this->TraitementRepository->triVersionPlan($array_fichiers);

                foreach ($tri_fichiers as $key_tf => $tf) {



                  //Déplacement des versions qui ne sont plus viable
                  if($tf['deplacer']==1){

                    //Echappement des caractères pour le nom du fichier -> serveur linux
                    $nom_fichier = $this->TraitementRepository->echapeCaractereLinux($array_fichiers[$tf['array_id']]);

                    //Création des chemins
                    $chemin_actuel['chemin']      = $chemin_etude.'/'.$nom_fichier;
                    $chemin_update['chemin']      = $chemin_etude.'/_old/'.$nom_fichier;
                    $chemin_update['dossier_nom'] = $chemin_etude.'/_old';

                    $data = $this->ScriptRepository->mvNextcloud($chemin_actuel,$chemin_update, $entreprise[$chantier->entreprise_id]);

                  //Copie des fichier à diffuser sur le dossier chantier
                  }else{

                    //Echappement des caractères pour le nom du fichier -> serveur linux
                    $nom_fichier = $this->TraitementRepository->echapeCaractereLinux($array_fichiers[$tf['array_id']]);

                    //Création des chemins
                    $chemin_actuel['chemin']      = $chemin_etude.'/'.$nom_fichier;
                    $chemin_copie['chemin']      = $chemin_chantier.'/'.$nom_fichier;
                    $chemin_copie['dossier_nom'] = $chemin_chantier;


                    $data = $this->ScriptRepository->cpNextcloud($chemin_actuel,$chemin_copie, $entreprise[$chantier->entreprise_id]);

                  }

                }


                // $data = $this->ScriptRepository->mvArrayNextcloud($chemin_nextcloud,$dossier_nom, $entreprise[$chantier->entreprise_id]);



        return view('test', ['test' =>  $array_fichiers, 'imputs' => $tri_fichiers, 'comp' => $data]);



              }

              # code...
            }
          // }
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
