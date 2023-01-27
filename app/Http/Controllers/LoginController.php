<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    //
    public function index(){
        // return'ok';
        
        if ($user = Auth::User()) {
            if ($user->hak_akses_id == '1') {
                return redirect()->intended('sewazoom');
            }elseif ($user->hak_akses_id == '2') {
                return redirect()->intended('portal');
            }
        }else {
            return view('auth.login');
            
        }
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->hak_akses_id == '1') {
                return redirect()->intended('portal');
            }elseif ($user->hak_akses_id == '2') {
                return redirect()->intended('portal');
            }
            return redirect()->intended('portal')
                        ->withSuccess('Signed in');
        }   
        return back()->withErrors([
            'username' => 'maaf username atau password anda salah'
        ])->onlyInput('username');
    }
        //1. proses cek uname pass
        //2. jika berhasil maka nyimpen session
        //3. selesai

        
}
