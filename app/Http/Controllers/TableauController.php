<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TableauRepository;
use App\Models\entreprise;
use App\Models\type_client;

class TableauController extends Controller
{

    public function __construct(TableauRepository $TableauRepository )
    {
        $this->chemin  = 'pages.tableaux.';
        $this->tableauRepository = $TableauRepository;
    }

    public function viewTable($entreprise_id,$table)
    {

        $entreprise=entreprise::where('id',$entreprise_id)->first();

        if($table=='clients'){
          $entreprises=entreprise::get();
          $type_clients=type_client::get();
          $data=$this->tableauRepository->selection_clients();
        // return view('test', ['test' =>  $type_clients, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_datatables',[
              'titre'        => $entreprise['nom'].' - Tableau Client',
              'descriptif'   => 'Liste des clients appartenant aux deux entreprises',
              'data'         => $data,
              'type_clients' => $type_clients,
              'entreprises'  => $entreprises,
          ]);

          // return view($this->chemin.$table.'_ktdatatables',[
          //     'titre'        => $entreprise['nom'].' - Tableau Client',
          //     'descriptif'   => 'Liste des clients appartenant aux deux entreprises',
          //     'data'         => $data,
          //     'type_clients' => $type_clients,
          //     'entreprises'  => $entreprises,
          // ]);


        }elseif($table=='devis'){
          return view($this->chemin.$table.'_ktdatatables',[
              'titre'        => $entreprise['nom'].' - Tableau Client',
              'descriptif'   => 'Liste des clients appartenant aux deux entreprises',
              // 'data'         => $data,
              // 'type_clients' => $type_clients,
              // 'entreprises'  => $entreprises,
          ]);
        }


        return view('test', ['test' =>  $entreprise, 'imputs' => '$a', 'comp' => '$table'.' ']);




    }






}
