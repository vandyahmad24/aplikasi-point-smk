<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;
use App\Jurusan;
use App\Foto;
use App\User;
use App\Profil_Guru;
use App\Profil_Siswa;

class AdminController extends Controller
{
    public function index()
    {
    	$jurusan = Jurusan::all();
        $guru = User::where('level','guru')->get();
        $guru_jumlah = User::where('level','guru')->count();
        $siswa = User::where('level','siswa')->count();
    	return view('admin.index',compact('jurusan','guru','guru_jumlah','siswa'));
    }
    public function jurusan()
    {
    	$jurusan = Jurusan::all();
    	return view('admin.jurusan',compact('jurusan'));
    }
    public function PostJurusan(Request $request)
    {
    	$this->validate($request,[
    		'kode' => 'required|string|max:12',
    		'jurusan' => 'required|string|min:6',
    	]);

    	Jurusan::create([
    		'kode' => $request->kode,
    		'nama' => $request->jurusan
     	]);
     	Session::flash("success","Data Anda telah tersimpan");
     	return Redirect::back();

    }
    public function deleteJurusan($id)
    {
    	$jurusan = Jurusan::find($id);
        $jurusan->delete();
        Session::flash("delete","Jurusan telah dihapus");
        return Redirect::back();

    }
    public function PutJurusan(Request $request)
    {
    	$this->validate($request,[
    		'kode' => 'required|string|max:12',
    		'jurusan' => 'required|string|min:6',
    	]);

    	$jurusan = Jurusan::find($request->id);
    	$jurusan->kode = $request->kode;
    	$jurusan->nama = $request->jurusan;
    	$jurusan->save();
    	Session::flash("success","Jurusan telah diedit");
        return Redirect::back();
    }  
    public function daftarFoto()
    {
    	$foto = Foto::all();
    	return view('admin.foto.foto',compact('foto'));
    }
    public function tambahFoto()
    {
    	return view('admin.foto.tambah_foto');
    }
    public function PostFoto(Request $request)
    {
    	$this->validate($request, [
			'nama_foto' => 'required',
			'nama_kegiatan' => 'required',
			'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$foto = new Foto;
		$foto->nama_foto = $request->nama_foto;
		$foto->nama_kegiatan = $request->nama_kegiatan;
		
        $request->file('gambar')->move('upload/foto/',$request->file('gambar')->getClientOriginalName());
        $foto->foto = $request->file('gambar')->getClientOriginalName(); 
         
        $foto->save();
        Session::flash("success","Foto telah ditambah");
        return redirect('/admin/foto');



    }
    public function deleteFoto($id)
    {
    	$foto = Foto::find($id);
        $foto->delete();
        Session::flash("delete","Jurusan telah dihapus");
        return redirect('/admin/foto');
    }
    public function daftarGuru()
    {
        $guru = Profil_Guru::JoinUser();
        // dd($guru);
        return view('admin.guru.guru',compact('guru'));
    }
     public function tambahGuru()
    {
       
        return view('admin.guru.tambah_guru');
    }
    public function PostGuru(Request $req)
    {
        $this->validate($req, [
            'nama' => 'required',
            'number' => 'required|min:3',
            'alamat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $gambar = $req->file('gambar');
        $req->file('gambar')->move('upload/profil/',$req->number.".".$gambar->getClientOriginalExtension());
        $foto= $req->number.".".$gambar->getClientOriginalExtension();


       $user_guru = User::create([
            'nama' => $req->nama,
            'number' => $req->number,
            'level' => 'guru',
            'foto' => $foto,
            'password' => Hash::make('smk_bumi_nusantara')
       ]);
       Profil_Guru::create([
            'user_id' => $user_guru->id,
            'alamat' => $req->alamat
       ]);
       Session::flash("success","Guru telah ditambah");
        return redirect('/admin/daftar-guru');
    }
    public function editGuru($id)
    {
        // dd($id)
        $guru = User::find($id);
        // dd($user->profil_guru->);
        return view('admin.guru.edit_guru',compact('guru'));
    }
     public function deleteGuru($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash("delete","Guru telah dihapus");
        return redirect('/admin/daftar-guru');

    }
    public function PutGuru(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'number' => 'required|min:3',
            'alamat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = User::find($request->id_user);
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
        $profil->alamat  = $request->alamat;
        $profil->save();
        Session::flash("success","Guru telah diedit");
        return redirect('/admin/daftar-guru');

    }
    public function daftarSiswa()
    {
        $siswa = Profil_Siswa::JoinUser();
        // dd($siswa);

        return view('admin.siswa.index',compact('siswa'));
    }
    public function tambahSiswa()
    {
         $jurusan = Jurusan::all();
        // dd($siswa);

        return view('admin.siswa.tambah',compact('jurusan'));
    }
    public function PostSiswa(Request $request)
    {
         // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'number' => 'required|min:3',
            'anggkatan' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'number' => $request->number,
            'level' => 'siswa',
            'foto' => 'default.jpg',
            'password' => Hash::make('smk_bisa')
        ]);
        Profil_Siswa::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'anggkatan' => $request->anggkatan,
            'point'     => 0
        ]);
         Session::flash("success","Siswa telah ditambah");
        return redirect('/admin/daftar-siswa');
    }
    public function editSiswa($id)
    {
       $user = User::find($id);
       $jurusan = Jurusan::all();
       return view('admin.siswa.edit_siswa',compact('user','jurusan'));
    }
    public function putSiswa(Request $request)
    {
         $this->validate($request, [
            'nama' => 'required',
            'number' => 'required|min:3',
            'anggkatan' => 'required',
            'alamat' => 'required',
        ]);
        $user = User::find($request->user_id);
        $user->nama = $request->nama;
        $user->number = $request->number;
        $user->save();
        $profil = Profil_Siswa::find($request->profil_id);
        $profil->alamat = $request->alamat;
        $profil->kelas = $request->kelas;
        $profil->jurusan = $request->jurusan;
        $profil->anggkatan = $request->anggkatan;
        $profil->save();
        Session::flash("success","Siswa telah diedit");
        return redirect('/admin/daftar-siswa');




    }
    public function deleteSiswa($id)
    {
       $user = User::find($id);
       $user->delete();
       Session::flash("delete","Siswa telah hapus");
        return redirect('/admin/daftar-siswa');
    }
}
