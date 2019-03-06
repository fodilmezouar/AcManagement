<?php

namespace App\Imports;

use App\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;

class EtudiantsImport implements ToModel
{
  private $groupe_id;
  function __construct($groupe_id){
       $this->groupe_id = $groupe_id;
  }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etudiant([
           'numero' => $row[0],
           'nom'    => $row[1], 
           'prenom' => $row[2],
           'naissance' => date_format(date_create($row[3]),"Y-m-d H:i:s"),
           'groupe_id' => $this->groupe_id,
        ]);
    }
}
