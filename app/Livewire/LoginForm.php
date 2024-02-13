<?php

namespace App\Livewire;

use DB;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class LoginForm extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function login_user(Request $request)
    {
        $this->validate();

        $incomingFields = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (auth()->attempt($incomingFields)) {
            // Successfully logged in
            session()->regenerate();
            return redirect('home')->with('success', 'You are now logged in!');
        } else {
            $this->addError('IC', 'Invalid credentials!');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
