<?php

namespace App\Http\Controllers;

use App\Exports\WasteExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new WasteExport, 'Записи по всем грузовым машинам.xlsx');
    }
}
