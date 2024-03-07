<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * 
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout_user');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login_user(Request $request)
    {
        try {
            DB::connection()->getPdo();
            try {
                $incomingFields = $request->validate([
                    'email' => 'required',
                    'password' => 'required'
                ]);

                if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
                    $request->session()->regenerate();
                    return redirect('home')->with('success', 'You are now logged in!');
                } else {
                    // Authentication failed, redirect with an error message
                    return redirect()->route('login')->with('error', 'Invalid credentials');
                }
            } catch (ValidationException $e) {
                // Handle validation errors
                return redirect()->route('login')->with($e->errors());
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with(['status' => 'error', 'message' => 'An unexpected error occurred', 'error' => $e->getMessage()]);
        }
    }


    public function logout_user(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error('Logout failed: ' . $e->getMessage());
            // You can handle the error in a way that makes sense for your application
            return redirect()->back()->with('error', 'Logout failed. Please try again.');
        }
    }
}
