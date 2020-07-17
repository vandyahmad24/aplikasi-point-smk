<?php

namespace App\Imports;

use App\User;
use App\Profil_Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
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
            'number' => $row['nis'],
            'level' => 'siswa',
            'password' => \Hash::make('smk_bisa'),
            'foto' => 'default.jpg',       
        ]);
        $profil = Profil_Siswa::create([
            'user_id' => $user->id,
            'alamat' => 'alamat siswa',
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'anggkatan' => $row['anggkatan'],
        ]);
    }
}
