<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Jurusan;
class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
        	'kode' => 'TKR',
        	'nama' => 'Teknik Kendaraan Ringan',
        ]);
        Jurusan::create([
        	'kode' => 'TKJ',
        	'nama' => 'Teknik Komputer Jaringan',
        ]);
        Jurusan::create([
        	'kode' => 'BSM',
        	'nama' => 'Bisnis Sepeda Motor',
        ]);
    }
}
