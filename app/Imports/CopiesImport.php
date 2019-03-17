<?php

namespace App\Imports;

use App\Copies;
use Maatwebsite\Excel\Concerns\ToModel;

class CopiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $paquet_id;
    private $etudiant_id;
    function __construct($paquet_id,$etudiant_id)
    {
        $this->paquet_id = $paquet_id;
        $this->etudiant_id = $etudiant_id;
    }
        public function model(array $row)
    {
        return new Copies([
            //
            'codeCopie' => $row[1],
            'paquetId'    => $this->etudiant_id,
            'etudiantId' => $this->paquet_id,

        ]);
    }
}
