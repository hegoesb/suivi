<?php namespace App\Repositories;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ScriptRepository {

	protected $parametre;

	public function __construct()
	{

	}
  //-------------------------
  // Nextcloud
  //-------------------------

  public function scanNextcloud()
  {
    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "cd /var/www/nextcloud/\n");
    fputs($ecrire, "ls\n");
    fclose($ecrire);

    exec('bash script/Nextcloud.sh', $data[0], $data[1]);

    return $data;
  }


  public function scanNextcloud_Symphoni()
  {
    $ecrire = fopen('script/Nextcloud.sh',"w");
    ftruncate($ecrire,0);
    fputs($ecrire, "#!/bin/bash\n\n");
    fputs($ecrire, "cd /home/vagrant\n");
    fputs($ecrire, "ls\n");
    fclose($ecrire);

    $process = new Process(['bash', 'script/Nextcloud.sh']);
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    return $process->getOutput();
  }





}


