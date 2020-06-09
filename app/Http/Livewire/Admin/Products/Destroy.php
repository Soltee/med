<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Destroy extends Component
{
	public $product;

	public function mount(Product $product)
	{
		$this->product = $product;
	}

    public function render()
    {
        return view('livewire.admin.products.destroy');
    }

    public function destroyProduct($product)
    {
    	$product = Product::findOrfail($product);
        File::delete([
            public_path($product->cover)
        ]);

        $product->delete();

        session()->flash('toast_success', 'Product deleted.');
        return redirect()->to('/admin/products');
    }
}
