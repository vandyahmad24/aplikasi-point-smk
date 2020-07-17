<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profil_Siswa;
use App\Log;
use Session;
use Validator;
use DB;

class SiswaController extends Controller
{
     public function index()
    {
        // $user = User::find($id);
        $log = Log::where('nama_siswa',Auth::user()->nama)->get();
    	return view('siswa.index',compact('log'));
    }
    public function editSiswa($id)
    {	
    	$user = User::find($id);
    	$log = Log::where('nama_siswa',$user->nama)->get();

    	return view('siswa.edit_profil',compact('user','log'));
    }
    public function putSiswa(Request $request)
    {
    	// dd($request->all());
    	 $this->validate($request, [
            'nama' => 'required',
            'number' => 'required|min:3',
            'alamat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = User::find($request->id);
        $user->nama = $request->nama;
        $user->number = $request->number;
        if($request->hasfile('gambar')){
            // dd($request->file('gambar'));
             $gambar = $request->file('gambar');
            $request->file('gambar')->move('upload/profil/',$request->number.".".$gambar->getClientOriginalExtension());
            $user->foto = $request->number.".".$gambar->getClientOriginalExtension(); 
            $user->save();
        }else{
            $user->save();
        }
        $profil = Profil_Siswa::find($request->profil_guru);
        // dd($profil);
        $profil->alamat  = $request->alamat;
        $profil->save();
        Session::flash("success","Profil telah diedit");
        return redirect('/siswa');
    }
    public function gantiPassword($id)
    {
    	$user = User::find($id);
    	return view('siswa.ganti_password',compact('user'));
    }
    public function updatePassword(Request $request)
    {
    	 // custom validator
                Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
                    return Hash::check($value, \Auth::user()->password);
                });
        
                // message for custom validation
                $messages = [
                    'password' => 'Invalid current password.',
                ];
        
                // validate form
                $validator = Validator::make(request()->all(), [
                    'current_password'      => 'required|password',
                    'password'              => 'required|min:6|confirmed',
                    'password_confirmation' => 'required',
        
                ], $messages);
        
                // if validation fails
                if ($validator->fails()) {
                    return redirect()
                        ->back()
                        ->withErrors($validator->errors());
                }
        
                // update password
                $user = User::find(Auth::id());
        
                $user->password = bcrypt(request('password'));
                $user->save();
        		Session::flash("success","Password telah di ganti");
                return redirect('/siswa');
    }
    public function siswaPoint()
    {
    	$terbanyak = Profil_Siswa::orderBy('point','desc')->take(3)->get();
    	$terkecil = Profil_Siswa::orderBy('point','asc')->take(3)->get();
    	// dd($terkecil);
    	return view('siswa.table_pelanggaran',compact('terbanyak','terkecil'));
    }
}
