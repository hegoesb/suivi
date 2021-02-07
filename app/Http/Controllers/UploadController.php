<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;


use App\Models\entreprise;

class UploadController extends Controller
{
    public function __construct()
    {
      $this->chemin_upload = 'pages.upload.';
    }

  //-------------------------
  // View
  //-------------------------


    public function viewUpload($entreprise_id,$table,$devis_id)
    {
      $entreprise=entreprise::where('id',$entreprise_id)->first();
      return view($this->chemin_upload.$table.'_upload2',[
          'titre'               => $entreprise['nom'].' - Télécharger un devis ou contrat',
          'descriptif'          => 'Le client sera ajouté à la table client commune aux deux entreprises. Un client peut appartenir aux deux entreprises',
          // 'type_client'      => $type_client,
          // 'choix_entreprise' => $choix_entreprise,
          'entreprise_id'       => $entreprise->id,
          'devis_id'            => $devis_id,
      ]);
    }

  //-------------------------
  // Post
  //-------------------------

    public function postUpload($entreprise_id, $table, Request $request)
    {

      $entreprise=entreprise::where('id',$entreprise_id)->first();

      if($table=='devis'){
        $this->validate($request, [
            'nom' => 'required',
            'nom_display' => 'required',
            'fichier' => 'required|file|mimes:pdf',
        ]);

        if($request->has('file')){
        return view('test', ['test' => 'oui', 'imputs' => '$a', 'comp' => $request->except(['_token'])]);

        }else{
          return redirect()->back();
        }

        return view('test', ['test' => 'non', 'imputs' => '$a', 'comp' => $request->except(['_token'])]);

      }
    }


}
