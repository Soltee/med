<?php

namespace App\Http\Controllers\User;

use Cart;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	/*Get all cart products.*/
	public function index()
	{
		$items = Cart::getContent();
		$sub   = Cart::getSubTotal();
		$tax   = 10;
		$total = Cart::getTotal();
		$total_items = $items->count();

		return view('cart', compact('items', 'sub', 'tax', 'total', 'total_items'));
	}


	/*
		* Add Cart Item
	*/
	public function store(Product $product)
	{
		// dd($product->name);
		$already_exists = Cart::get($product->id) ?? null;
		// dd($already_exists);
		if($already_exists){
			Cart::update($already_exists->id, [
				'quantity' => 1
			]);
			return redirect('/cart')->with('toast_success', 'Your product has been updated.');
		} else {
			Cart::add([
			    'id' => $product->id, // inique row ID
			    'name' => $product->name,
			    'price' => $product->price,
			    'quantity' => 1,
			    'attributes' => [
			    	'image' => $product->cover
			    ],
			    'associatedModel' => $product
			]);
			return redirect()->back()->with('toast_success', 'Your product has been added to your cart.');	
		}
		

	}


	/* update */
	public function update(Product $product)
	{
		$data = request()->quantity;
		if($data && $data > 0)
		{
			Cart::update($product->id, array(
			  'quantity' => array(
			      'relative' => false,
			      'value' => $data
			  ),
			));
			
			return back()->with('toast_success', 'Your product has been updated.');
		} elseif($data < 1)
		{
			Cart::remove($product->id);
			return back()->with('toast_success', 'Your product has been removed from the cart.');
		}	
	}


	/* Remove Cart */
	public function destroy(Product $product)
	{
		Cart::remove($product->id);
		return back()->with('toast_success', 'Your product has been removed from the cart.');
	}

	/* Clear Cart */
	public function clear()
	{
		Cart::clear();
		return back()->with('toast_success', 'Your cart has been cleared.');
	}

	/*Guard*/
    protected function guard()
    {
    	return Auth::guard('user');
    }
}
