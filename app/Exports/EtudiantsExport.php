<?php

namespace App\Exports;

use App\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
class EtudiantsExport implements FromCollection, WithHeadings, ShouldAutoSize,WithEvents
{
	private $grpId;
	function __construct($grpId){
      $this->grpId = $grpId;
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Etudiant::select('numero','nom','prenom','naissance')->where('groupe_id','=',$this->grpId)->get();
    }
    public function headings(): array
    {
        return [
            'Numero',
            'Nom',
            'Prenom',
            'Naissance'
        ];
    }
    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function(BeforeExport $event) {
            },
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->styleCells(
                    'A1:D1',
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  15,
                            'bold'      =>  true,
                            'color' => ['rgb' => '000000'],
                        )
                    ]
                );
            },
        ];
    }
}
