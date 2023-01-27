<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'superadmin') {
            return redirect('superadmin/home');
        } else if (Auth::user()->role == 'admin') {
            return redirect('admin/home');
        } else {
            return redirect('user/home');
        }
    }

    public function superadminHome() {
        // if (auth()->user()) {
        //     return response()->json(['status_message' => 'Terautentikasi sebagai superadmin'], 200);
        // }
        // return response()->json(['status_message' => 'Tidak terautentikasi'], 401);
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string'
        // ]);
        
        // $credentials = request(['email', 'password']);

            // return view('dashboard');
        if(Auth::user()->role == 'superadmin') {
            return response()->view('dashboard')->setStatusCode(200);
            // return response()->json([
            //     'message' => 'Terautentikasi sebagai superadmin'
            // ], 200);
        } else {
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            return redirect('login')->setStatusCode(401);   
        }

    }

    public function adminHome() {
        // return view('admin.home');
        // return view('dashboard');
        if(Auth::user()->role == 'admin') {
            // return response()->json([
            //     'message' => 'Terautentikasi sebagai admin'
            // ], 200);
            return response()->view('dashboard')->setStatusCode(200);
        } else {
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            return redirect('login')->setStatusCode(401);   
        }
    }

    public function userHome() {
        // return view('user.home');
        // return view('dashboard');
        if(Auth::user()->role == 'user') {
            // return response()->json([
            //     'message' => 'Terautentikasi sebagai superadmin'
            // ], 200);
            return response()->view('dashboard')->setStatusCode(200);
        } else {
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            // return route('/');
            return redirect('login')->setStatusCode(401);   
        }
    }
}
