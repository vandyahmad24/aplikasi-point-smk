<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {

        $this->validate($request, [
        'number' => 'required|string|min:3', //VALIDASI KOLOM USERNAME
        //TAPI KOLOM INI BISA BERISI EMAIL ATAU USERNAME
        'password' => 'required|string|min:6',
        ]);

        $login = [
            'number' => $request->number,
            'password' => $request->password
        ];
        if (auth()->attempt($login)) {
        //JIKA BERHASIL, CEK levelnya
            $role = Auth::user();
        
            if($role->level == 'siswa'){
                 return redirect()->route('siswa');
            }else if($role->level == 'admin'){
                return redirect()->route('admin');
            }else{
                return redirect()->route('guru');
            }
           
        }

         //JIKA SALAH, MAKA KEMBALI KE LOGIN DAN TAMPILKAN NOTIFIKASI 
        return redirect()->route('login')->with(['error' => 'NIS/Password salah!']);
    }
}
