<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Profil_Guru extends Model
{
     protected $table = 'profil_gurus';
     protected $fillable = [
        'user_id', 'alamat',
    ];
    public function user_relasi()
    {
    	return $this->belongsTo('App\User');
    }
    public function scopeJoinUser()
    {
    	$query = DB::table('users as u')
    			->join('profil_gurus as pg','u.id','=','pg.user_id')
    			->where('u.level','=','guru')
    			->select('u.*','pg.alamat')
    			->get();
    	return $query;
    }
   
}
