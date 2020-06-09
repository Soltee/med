<?php

namespace App\Http\Livewire\Admin;

use App\User;
use App\Post;
use App\Product;
use Livewire\Component;

class Dashboard extends Component
{

	public $users, $posts, $products;

	public function mount()
	{
		$this->users = User::count();
		$this->posts = Post::count();
		$this->products = Product::count();
	}

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
