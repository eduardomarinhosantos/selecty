<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Admin;

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
    protected $redirectTo = '/candidato';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    protected function authenticated(){
        return redirect()->route('candidato.index');
    }

    #########
    # ADMIN #
    #########
    public function showAdminLoginForm() {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request) {

        if (\Auth::guard('admin')->attempt(
            ['email' => $request->email, 'password' => $request->password], 
            $request->get('remember')
        )) {
            return redirect()->intended('/candidato');
        }
        
        return back()->withInput($request->only('email', 'remember'));
    }

    protected function attemptLogin(Request $request) {

       return \Auth::guard('candidato')->attempt(
            ['email' => $request->email, 'password' => $request->password], 
            $request->get('remember')
        );
    }

    public function logout(Request $request) {

        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect(
            (\Auth::guard('admin')->check()) ? '/login/admin': '/login'
        );
    }
}
