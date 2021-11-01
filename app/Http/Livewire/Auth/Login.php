<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:6'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->route('home');
        }

        $this->addError('email', __('The provided credentials do not match our records'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
