<?php

namespace App\Http\Livewire\Admin\Category;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

    public function render()
    {
    	$paginate  = Category::latest()->paginate(8);
        return view('livewire.admin.category.index', [
        	'categories' => $paginate
        ]);
    }

}
