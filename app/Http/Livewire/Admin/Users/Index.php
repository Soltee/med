<?php

namespace App\Http\Livewire\Admin\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

    public function render()
    {
    	$paginate = User::latest()->paginate(8);
        return view('livewire.admin.users.index', [
        	'users' => $paginate
        ]);
    }
}
