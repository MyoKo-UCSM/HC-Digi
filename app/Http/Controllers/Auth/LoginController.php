<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected $loginPath = '/letadminin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectTo()
    {
        return redirect('/admin');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Google captcha need to verify first.',
        ]);

        $remember = $request->has('remember') ? true : false;

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']), $remember)) {
            return redirect('/admin');
        } else {
            return redirect()->back()
                ->with('error', 'Your Credentials are invalid');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/letadminin');
    }
}
