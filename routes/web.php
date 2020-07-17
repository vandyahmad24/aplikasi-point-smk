<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('root');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil-sekolah', 'HomeController@profil')->name('profil');
Route::get('/visi-misi', 'HomeController@visi_misi')->name('visi-misi');
Route::get('/gedung', 'HomeController@gedung')->name('gedung');
Route::post('/guru/import', 'ExcelController@import')->name('import-guru');
Route::get('/guru/export', 'ExcelController@export')->name('export-guru');
Route::post('/siswa/import', 'ExcelController@Siswaimport')->name('import-siswa');
Route::get('/siswa/export', 'ExcelController@Siswaexport')->name('export-siswa');

// route ssiwa
Route::group(['prefix' => 'admin', 'middleware' => ['checkadmin','auth']], function()
{ 
	Route::get('/', 'AdminController@index')->name('admin');
	Route::get('/jurusan', 'AdminController@jurusan')->name('jurusan');
	Route::post('/jurusan', 'AdminController@PostJurusan')->name('post-jurusan');
	Route::get('/jurusan/delete/{id}', 'AdminController@deleteJurusan')->name('delete-jurusan');
	Route::post('/put-jurusan', 'AdminController@PutJurusan')->name('put-jurusan');
	Route::get('/foto', 'AdminController@daftarFoto')->name('foto');
	Route::get('/tambah-foto', 'AdminController@tambahFoto')->name('tambah-foto');
	Route::post('/post-foto', 'AdminController@PostFoto')->name('post-foto');
	Route::get('/foto/delete/{id}', 'AdminController@deleteFoto')->name('delete-foto');
	Route::get('/daftar-guru', 'AdminController@daftarGuru')->name('daftar-guru');
	Route::get('/tambah-guru', 'AdminController@tambahGuru')->name('tambah-guru');
	Route::post('/post-guru', 'AdminController@PostGuru')->name('post-guru');
	Route::get('/edit/guru/{id}', 'AdminController@editGuru')->name('edit-guru');
	Route::get('/guru/delete/{id}', 'AdminController@deleteGuru')->name('delete-guru');
	Route::post('/put-guru', 'AdminController@PutGuru')->name('put-guru');
	
	Route::get('/daftar-siswa', 'AdminController@daftarSiswa')->name('daftar-siswa');
	Route::get('/tambah-siswa', 'AdminController@tambahSiswa')->name('tambah-siswa');
	Route::post('/post-siswa', 'AdminController@PostSiswa')->name('post-siswa');
	Route::get('/edit-siswa/{id}', 'AdminController@editSiswa')->name('edit-siswa');
	Route::get('/delete-siswa/{id}', 'AdminController@deleteSiswa')->name('delete-siswa');
	Route::post('/put-siswa/', 'AdminController@putSiswa')->name('put-siswa');

	


});

// route siswa
Route::group(['prefix' => 'siswa', 'middleware' => ['checksiswa','auth']], function()
{ 
	Route::get('/', 'SiswaController@index')->name('siswa');
	Route::get('/edit-siswa/{id}', 'SiswaController@editSiswa')->name('edit-dari-siswa');
	Route::post('/edit-siswa/', 'SiswaController@putSiswa')->name('put-profil-siswa');
	Route::get('/ganti-password-siswa/{id}', 'SiswaController@gantiPassword')->name('ganti-password-siswa');
	Route::post('/siswa-put-password/', 'SiswaController@updatePassword')->name('siswa-put-password');
	Route::get('/siswa-point', 'SiswaController@siswaPoint')->name('siswa-point');
});

// route guru
Route::group(['prefix' => 'guru', 'middleware' => ['checkguru','auth']], function()
{ 
	Route::get('/', 'GuruController@index')->name('guru');
	Route::get('/edit-guru/{id}', 'GuruController@editGuru')->name('edit-dari-guru');
	Route::post('/edit-guru/', 'GuruController@putGuru')->name('put-profil-guru');
	Route::get('/ganti-password-guru/{id}', 'GuruController@gantiPassword')->name('ganti-password-guru');
	Route::post('/ganti-password-guru/', 'GuruController@updatePassword')->name('guru-put-password');
	Route::get('/daftar-siswa', 'GuruController@daftarSiswa')->name('guru-daftar-siswa');
	Route::get('/tambah-point/{id}', 'GuruController@tambahPoint')->name('tambah-point');
	Route::post('/post-point-siswa/', 'GuruController@PostPoint')->name('tambah-point-siswa');
	Route::get('/histori-point/{id}', 'GuruController@historiPoint')->name('histori-point');
});



Auth::routes();
