<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TableauRepository;

use App\Models\chantier;
use App\Models\devi;
use App\Models\facture;
use App\Models\entreprise;
use App\Models\paiement;
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
        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_datatables',[
              'titre'         => $entreprise['nom'].' - Tableau Client',
              'descriptif'    => 'Liste des clients appartenant aux deux entreprises',
              'data'          => $data,
              'type_clients'  => $type_clients,
              'entreprises'   => $entreprises,
              'entreprise'    => $entreprise,
              'table'         => $table,
              'colonne_order' => 1,
              'ordre'         => "asc",
          ]);
        }elseif($table=='chantiers'){

          $data=chantier::with('client','etat_chantier')->where('entreprise_id',$entreprise->id)->get();
          // return view('test', ['test' =>  $data[1]->NomChantier, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_datatables',[
              'titre'         => $entreprise['nom'].' - Tableau Chantier',
              'descriptif'    => 'Liste des chantiers appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
              'entreprise'    => $entreprise,
              'table'         => $table,
              'data'          => $data,
              'colonne_order' => 1,
              'ordre'         => "desc",
          ]);
        }elseif($table=='devis'){

          $data=devi::with('etat_devi','type_devi','client','chantier','collaborateur')->where('entreprise_id',$entreprise->id)->get();
          // return view('test', ['test' =>  $data[0]->IfNull, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_datatables',[
              'titre'        => $entreprise['nom'].' - Tableau Devis',
              'descriptif'   => 'Liste des devis appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
              'data'         => $data,
              'colonne_order' => 1,
              'ordre'         => "desc",
          ]);
        }elseif($table=='factures'){

          $data=facture::with('type_facture','client','chantier','collaborateur','devi')->where('entreprise_id',$entreprise->id)->get();

          return view($this->chemin.$table.'_datatables',[
              'titre'        => $entreprise['nom'].' - Tableau Factures',
              'descriptif'   => 'Liste des factures appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
              'data'         => $data,
              'colonne_order' => 1,
              'ordre'         => "desc",
          ]);

        }elseif($table=='paiements'){

          $data=paiement::with('type_paiement','client','facture')->where('entreprise_id',$entreprise->id)->get();
        // return view('test', ['test' =>  $data, 'imputs' => '$a', 'comp' => '$table'.' ']);

          return view($this->chemin.$table.'_datatables',[
              'titre'         => $entreprise['nom'].' - Tableau Paiements',
              'descriptif'    => 'Liste des paiements appartenant à l\'entreprise '.$entreprise['nom_display'].'.',
              'data'          => $data,
              'colonne_order' => 1,
              'ordre'         => "desc",
          ]);

        }

        abort(404);

    }






}
