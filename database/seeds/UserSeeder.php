<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'nama' => 'siswa user 1',
        	'number' => '001',
        	'level' => 'siswa',
        	'foto' => 'default.jpg',
        	'password' => Hash::make('12341234')
        ]); 
         User::create([
        	'nama' => 'admin user 1',
        	'number' => '002',
        	'level' => 'admin',
        	'foto' => 'default.jpg',
        	'password' => Hash::make('12341234')
        ]); 
          User::create([
        	'nama' => 'guru user 1',
        	'number' => '003',
        	'level' => 'guru',
        	'foto' => 'default.jpg',
        	'password' => Hash::make('12341234')
        ]); 
    }
}
