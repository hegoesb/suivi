<?php namespace App\Repositories;

use App\Models\client;

class TableauRepository {

	protected $parametre;

	public function __construct()
	{

	}

	public function selection_clients()
	{

        $data = client::with('entreprise','type_client')->get();

        return $data;

	}


}
