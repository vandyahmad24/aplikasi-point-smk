<?php

namespace App\Exports;

use App\User;
use App\Profil_Guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function view(): View
	{
        // $query = Jurusan::JoinUser();

        return view('exports.guru', [
            'guru' => Profil_Guru::JoinUser()
        ]);
	}
    
}
