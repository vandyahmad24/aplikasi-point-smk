<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersExport;
use App\Imports\GuruImport;
use App\Imports\Siswaimport;
use App\Exports\GuruExport;
use App\Exports\SiswaExport;

use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function import(Request $request) 
    {
        Excel::import(new GuruImport,$request->file('file'));
           
        return back();
    }
     public function export() 
    {
        return Excel::download(new GuruExport, 'Data Guru.xlsx');
    }
    public function Siswaimport(Request $request)
    {
        Excel::import(new Siswaimport,$request->file('file'));
           
        return back();
    }
     public function Siswaexport() 
    {
        return Excel::download(new SiswaExport, 'Data Siswa.xlsx');
    }
}
