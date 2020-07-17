<?php

namespace App\Imports;

use App\User;
use App\Profil_Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $user = User::create([
            'nama' => $row['nama'],
            'number' => $row['nik'],
            'level' => 'guru',
            'password' => \Hash::make('smk_bumi_nusantara'),
            'foto' => 'default.jpg',       
        ]);
        $profil = Profil_Guru::create([
            'user_id' => $user->id,
            'alamat' => $row['alamat'],
        ]);
    }
}
