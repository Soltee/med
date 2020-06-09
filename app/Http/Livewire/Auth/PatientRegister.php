<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PatientRegister extends Component
{
	public $name;
	public $email;
	public $password;
	public $password_confirmation;
	public $userType;

    public function render()
    {
        return view('livewire.auth.patient-register');
    }

    public function submit()
    {
    	$data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    	
    	$user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->guard()->login($user);

        session()->flash('toast_success', 'Your account has been created.');
        return redirect()->to('/home');
    }


	/**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
