<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profil_Guru;
use App\Log;
use App\Profil_Siswa;
use Session;
use Validator;
use DB;
class GuruController extends Controller
{
    public function index()
    {
    	return view('guru.index');
    }
    public function editGuru($id)
    {
    	$user = User::find($id);
    	return view('guru.edit_profi',compact('user'));
    }
    public function putGuru(Request $request)
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
        $profil = Profil_Guru::find($request->profil_guru);
        // dd($profil);
        $profil->alamat  = $request->alamat;
        $profil->save();
        Session::flash("success","Guru telah diedit");
        return redirect('/guru');
    }
    public function gantiPassword($id)
    {
    	$user = User::find($id);
    	return view('guru.ganti_password',compact('user'));
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
                return redirect('/guru');
        }
        public function daftarSiswa()
        {
             $siswa = Profil_Siswa::JoinUser();
        // dd($siswa);

        return view('guru.siswa',compact('siswa'));
        }
        public function tambahPoint($id)
        {
            $siswa = User::find($id);
            // dd($siswa);
            return view('guru.tambah_point',compact('siswa'));
        }
        public function PostPoint(Request $request)
        {
            $point = Log::create([
                'guru_bk' => Auth::user()->nama,
                'nama_siswa' => $request->nama,
                'keterangan' => $request->keterangan,
                'jenis_point' => $request->jenis_point,
                'subpoint' => $request->subpoint
            ]);

            $user = Profil_Siswa::where('user_id',$request->id)->first();
            // dd($user);
            if($request->jenis_point=='pelanggaran'){
                $user->point = $user->point-$request->subpoint;
            }else{
                $user->point = $user->point+$request->subpoint;
            }
            
            $user->save();
            Session::flash("success","Berhasil membuat point");
            return redirect('/guru/daftar-siswa');


        }
        public function historiPoint($value)
        {
            // dd($value);
            $point = DB::table('logs')->where('nama_siswa','=',$value)->get();
            // dd($point);
            return view('guru.histori',compact('point'));
        }
}
