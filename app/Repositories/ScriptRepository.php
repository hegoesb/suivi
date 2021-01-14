<?php namespace App\Repositories;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use Illuminate\Support\Facades\Storage;

// use App\Repositories\GestionDossierEDISRepository;

class ScriptRepository {

	protected $parametre;

	public function __construct()
	{
        // $this->GD_EDIS = $GestionDossierEDISRepository;
	}

  //-------------------------
  // Nextcloud - Scan
  //-------------------------

  public function scanNextcloud($nom_dossier)
  {

    // $nom_dossier = $this->GD_EDIS->nomDossier($value, $entreprise);

    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "cd /var/www/nextcloud/\n");
    fputs($ecrire, "sudo -u www-data php occ files:scan --path='Edis/files/".$nom_dossier."' Edis\n");
    fclose($ecrire);

    exec('bash script/Nextcloud.sh', $data[0], $data[1]);

    return $data;
  }


  public function scanNextcloud_Symphoni($value, $entreprise)
  {
    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "cd /var/www/nextcloud/\n");
    fputs($ecrire, "sudo -u www-data php occ files:scan --path='Edis/files/BDX_311_Pre-Etudes' Edis\n");
    fclose($ecrire);

    $process = new Process(['bash', 'script/Nextcloud.sh']);
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    return $process->getOutput();
  }

  public function lsNextcloud_arrayChemin($chemin, $entreprise)
  {

    // return $chemin;

    foreach ($chemin as $key_c => $c) {
      $ecrire = fopen('script/Nextcloud.sh',"w");
      ftruncate($ecrire,0);
      fputs($ecrire, "#!/bin/bash\n\n");
      fputs($ecrire, "ls ".env('APP_PATH_STORAGE')."/".$c['dossier']);
      fclose($ecrire);
      exec('bash script/Nextcloud.sh', $data[$key_c][0], $data[$key_c][1]);
    }

    return $data;
  }

  public function lsNextcloud_arrayChemin2($chemin, $entreprise)
  {

    // return $chemin;
    foreach ($chemin as $key_c => $c) {

      $ecrire = fopen('script/Nextcloud.sh',"w");
      ftruncate($ecrire,0);
      fputs($ecrire, "#!/bin/bash\n\n");
      fputs($ecrire, "ls ".env('APP_PATH_STORAGE')."/".$c['dossier']."\n");
      fclose($ecrire);

      $process = new Process(['bash', 'script/Nextcloud.sh']);
      $process->run();

      if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
      }
      $data[$key_c]=$process->getOutput();

    }

    return $data;

  }



  //-------------------------
  // Nextcloud - Renommer Dossier ou déplacer
  //-------------------------

  public function mvNomNextcloud($chemin, $entreprise)
  {
    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "mv ".env('APP_PATH_STORAGE')."/".$chemin['chemin_actuel']." ".env('APP_PATH_STORAGE')."/".$chemin['chemin_update']."\n");
    fputs($ecrire, "ls ".env('APP_PATH_STORAGE')."/".$chemin['dossier']."\n");
    fclose($ecrire);
    exec('bash script/Nextcloud.sh', $data[0], $data[1]);
    return $data;
  }

  //-------------------------
  // Nextcloud - Déplacer
  //-------------------------

  public function mvNextcloud($chemin_actuel,$chemin_update, $entreprise)
  {
    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "mv ".env('APP_PATH_STORAGE')."/".$chemin_actuel['chemin']." ".env('APP_PATH_STORAGE')."/".$chemin_update['chemin']."\n");
    fputs($ecrire, "ls ".env('APP_PATH_STORAGE')."/".$chemin_update['dossier_nom']."\n");
    fclose($ecrire);
    exec('bash script/Nextcloud.sh', $data[0], $data[1]);
    return $data;
  }

  //-------------------------
  // Nextcloud - Suivi dernier plan pour chantier
  //-------------------------


  public function suiviDernierPlanNextcloud()
  {
    // $ecrire = fopen('script/Nextcloud.sh',"w");
    // ftruncate($ecrire,0);
    // fputs($ecrire, "#!/bin/bash\n\n");
    // fputs($ecrire, "ls -R ".env('APP_PATH_STORAGE')."\n");
    // fclose($ecrire);
    // exec('bash script/Nextcloud.sh', $data[0], $data[1]);

    $data = Storage::disk('EDIS')->allDirectories('/BDX_312_Etudes-Chantiers');

    foreach ($data as $key_d => $d) {
      # code...
    }

    return $data;
  }

}


