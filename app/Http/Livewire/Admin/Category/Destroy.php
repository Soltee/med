<?php

namespace App\Http\Livewire\Admin\Category;

use App\Category;
use Livewire\Component;

class Destroy extends Component
{	
	public $category;

	public function mount(Category $category)
	{
		$this->category = $category;
	}

    public function render()
    {
        return view('livewire.admin.category.destroy');
    }


    public function destroyCategory($category)
    {
    	$category = Category::findOrfail($category);

        $category->delete();

        session()->flash('toast_success', 'Category deleted.');
        return redirect()->to('/admin/categories');
    }
}
