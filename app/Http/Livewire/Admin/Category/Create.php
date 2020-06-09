<?php

namespace App\Http\Livewire\Admin\Category;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
	public $name = '';

    public function render()
    {
        return view('livewire.admin.category.create');
    }


    public function store()
    {
    	Category::create([
    		'name' => $this->name,
    		'slug' => Str::slug($this->name)
    	]);
    	

    	$this->reset();

    	session()->flash('toast_success', 'Category created.');
        return redirect()->to('/admin/categories');
    }


}
