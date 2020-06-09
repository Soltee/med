<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
 	use WithPagination;

    public function render()
    {
    	$paginate  = Product::latest()->paginate(8);

        return view('livewire.admin.products.index', [
        	'products' => $paginate->items(),
        	'first'    => $paginate->firstItem(),
        	'last'     => $paginate->lastItem(),
        	'prev'     => $paginate->previousPageUrl(),
        	'next'     => $paginate->nextPageUrl(),
        	'total'    => $paginate->total()
        ]);
    }
}
