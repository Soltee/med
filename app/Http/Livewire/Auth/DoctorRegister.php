<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DoctorRegister extends Component
{
	public $name;
	public $email;
	public $password;
	public $password_confirmation;
	public $userType;
    public function render()
    {
        return view('livewire.auth.doctor-register');
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
            'patient'  => false
        ]);

        $this->guard()->login($user);

        session()->flash('toast_success', 'Your account has been created.');
        return redirect()->to('/home');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
}
