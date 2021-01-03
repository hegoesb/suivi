<?php namespace App\Repositories;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use App\Repositories\GestionDossierEDISRepository;

class ScriptRepository {

	protected $parametre;

	public function __construct(GestionDossierEDISRepository $GestionDossierEDISRepository)
	{
        $this->GD_EDIS = $GestionDossierEDISRepository;
	}
  //-------------------------
  // Nextcloud
  //-------------------------

  public function scanNextcloud($value, $entreprise)
  {

    $nom_dossier = $this->GD_EDIS->nomDossier($value, $entreprise);

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





}


