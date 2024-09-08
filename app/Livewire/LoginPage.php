<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title("Login")]
class LoginPage extends Component
{
    public string $email;
    public string $password;

    public function login()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        $this->addError('email', 'The provided email does not match our records.');
        $this->addError('password', 'The provided password does not match our records.');
    }

    public function render()
    {
        return view('livewire.login-page');
    }
}
