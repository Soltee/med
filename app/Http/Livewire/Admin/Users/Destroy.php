<?php

namespace App\Http\Livewire\Admin\Users;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Destroy extends Component
{
	public $user;

	public function mount(User $user)
	{
		$this->user = $user;
	}

    public function render()
    {
        return view('livewire.admin.users.destroy');
    }

    public function destroyUser($user)
    {
    	$user = User::findOrfail($user);
        File::delete([
            public_path($user->avatar)
        ]);

        $user->delete();

        session()->flash('toast_success', 'User deleted.');
        return redirect()->to('/admin/users');
    }
}
