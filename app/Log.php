<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Log extends Model
{
     protected $fillable = [
        'guru_bk', 'nama_siswa','keterangan','jenis_point','subpoint'
    ];
    public function scopeLogJoinUser()
    {
    	$query = DB::table('users as u')
    			->join('profil_gurus as pg','u.id','=','pg.user_id')
    			->where('u.level','=','guru')
    			->select('u.*','pg.alamat')
    			->get();
    	return $query;
    }
}
