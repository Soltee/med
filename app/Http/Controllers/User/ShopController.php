<?php

namespace App\Http\Controllers\User;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
    	$paginate    = Product::latest()->paginate(8);
    	$products    = $paginate->items();
    	$prev        = $paginate->previousPageUrl();
    	$next        = $paginate->nextPageUrl();
    	$first        = $paginate->firstItem();
    	$last        = $paginate->lastItem();
    	$total       = $paginate->total();
    	return view('shop', compact('products', 'prev', 'next', 'first', 'last', 'total'));
    }

    /*
		* Show Single Product
    */
	public function show(Product $product, $slug)
	{
		return view('product', compact('product'));
	}
}
