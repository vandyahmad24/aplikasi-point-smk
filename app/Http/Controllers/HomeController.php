<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function profil()
    {
        return view('profil');
    }
    public function visi_misi()
    {
        return view('visi_misi');
    }
    public function gedung()
    {
        return view('kondisi_gedung');
    }
}
