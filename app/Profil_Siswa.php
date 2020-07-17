<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profil_Siswa extends Model
{
    protected $table = 'profil_siswas';
    protected $fillable = [
        'user_id', 'alamat','kelas','jurusan','anggkatan','point'
    ];
      public function user()
    {
        return $this->belongsTo('App\User');
    }

     public function scopeJoinUser()
    {
    	$query = DB::table('users as u')
    			->join('profil_siswas as ps','u.id','=','ps.user_id')
    			->where('u.level','=','siswa')
    			->select('u.*','ps.*','ps.id as profil_id','u.id as id_user')
    			->get();
    	return $query;
    }
}
