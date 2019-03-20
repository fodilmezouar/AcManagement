<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Sheet;

class EtudiantController extends Controller
{
    public function export($grpId) 
    {
    	Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
        $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });
        return Excel::download(new EtudiantsExport($grpId), 'students.xlsx');
    }
}
