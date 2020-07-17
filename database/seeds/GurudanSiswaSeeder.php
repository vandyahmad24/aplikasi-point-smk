<?php

use Illuminate\Database\Seeder;
use App\Profil_Guru;
use App\Profil_Siswa;

class GurudanSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil_Guru::create([
        	'user_id' => '003',
        	'alamat'  => 'Jalan akasia 9'
        ]);
        Profil_Siswa::create([
        	'user_id' => '001',
        	'alamat' => 'jalanin aja dulu',
        	'kelas' => 'X',
        	'jurusan' => 'TKJ',
        	'anggkatan' => '2016',
        	'point'		=> 0

        ]);

    }
}
