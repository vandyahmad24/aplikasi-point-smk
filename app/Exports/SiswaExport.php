<?php

namespace App\Exports;

use App\User;
use App\Profil_Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
	{
        // $query = Jurusan::JoinUser();

        return view('exports.siswa', [
            'siswa' => Profil_Siswa::JoinUser()
        ]);
	}
}
