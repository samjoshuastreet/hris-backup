<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginForm extends Component
{

    public $email;
    public $password;
    public function login_user(Request $request)
    {
        try {
            $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $incomingFields = [
                'email' => $this->email,
                'password' => $this->password,
            ];

            if (auth()->attempt($incomingFields)) {
                // Successfully logged in
                session()->regenerate();
                return redirect('home')->with('success', 'You are now logged in!');
            } else {
                // Invalid credentials
                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with(['status' => 'error', 'message' => 'An unexpected error occurred', 'error' => $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
