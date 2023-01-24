<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DateTime;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        $input = $request->all();

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $credentials = request(['username', 'password']);

        if(!Auth::attempt($credentials)) {
            return redirect()->route('login')
                            ->with('error', 'Username and Password are wrong');   
        }
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me) {
            $token->expires_at = new DateTime('9999-12-31');
        }

        $token->save();
        
        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'superadmin') {
                return redirect()->route('superadmin.home');
            } else if (auth()->user()->role == 'admin'){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('login')
                    ->with('error', 'Usernae and Password are wrong');
        }
    }

    public function logout(Request $request) {
        // $request->user()->token()->delete();
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        Auth::logout(); // logout user
        return redirect(\URL::previous());
    }
}
