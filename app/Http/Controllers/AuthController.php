<?php

namespace App\Http\Controllers;

use PharIo\Manifest\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function forget()
    {
        return view('auth.forget');
    }

    public function login_new(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
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
                    return redirect()->route('forget')->with('error', 'Invalid credentials');
                }
            } catch (ValidationException $e) {
                // Handle validation errors
                return redirect()->route('forget')->with($e->errors());
            }
        } catch (\Exception $e) {
            return redirect()->route('forget')->with(['status' => 'error', 'message' => 'An unexpected error occurred', 'error' => $e->getMessage()]);
        }
    }
}
