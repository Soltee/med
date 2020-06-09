<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 	public function index()
 	{
 		return view('admin.products.index');
 	}   

 	public function create()
    {
    	return view('admin.products.create');
    }

    public function store(Request $request)
    {
    	$data = $this->validate($request , [
    		'name'       => 'string|min:4|unique:products',
    		'price'      => 'numeric|min:1',
    		'quantity'   => 'numeric|min:1',
    		'price'      => 'numeric|min:1'
    	]);

        $photo = $request->file('cover');
        // dd(request()->all());
        if($photo)
        {
            if(! is_dir(public_path('/products'))){
                mkdir(public_path('/products'), 0777);
            }

            $basename  = Str::random();
            $original  = '/products/product-' . $basename . '.' . $photo->getClientOriginalExtension();

            $img = Image::make($photo->getRealPath());
            $img->fit(600, 600, function ($constraint) {
                $constraint->upsize();                 
            });

            $img->stream(); // <-- Key point
            $photo->move(public_path('/products'), $original);

            $coverimage = ['cover' => $original];

            if($request->prev_price){
                $this->validate($request, [
                    'prev_price' => 'numeric|min:1'
                ]);

                $prev_price = ['prev_price' => $request->prev_price];
            }

            if($request->description){
                $this->validate($request, [
                    'description' => 'numeric|min:1'
                ]);

                $description = ['description' => $request->description];
            }

        	$product = Product::create(array_merge($data, $coverimage, $prev_price ?? [], $description ?? []));



        	return back()->with('toast_success', 'Product uploaded.');
        }
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request,Product $product)
    {
    	$data = $this->validate($request , [
            'name'       => 'string|min:4|unique:products',
    		'price'      => 'numeric|min:1',
    		'quantity'   => 'numeric|min:1',
    		'price'      => 'numeric|min:1'
    	]);

        $photo = $request->file('cover');
        // dd(request()->all());
        if($photo)
        {
            if(! is_dir(public_path('/products'))){
                mkdir(public_path('/products'), 0777);
            }

            $basename  = Str::random();
            $original  = '/products/product-' . $basename . '.' . $photo->getClientOriginalExtension();

            $img = Image::make($photo->getRealPath());
            $img->fit(600, 600, function ($constraint) {
                $constraint->upsize();                 
            });

            $img->stream(); // <-- Key point
            $photo->move(public_path('/products'), $original);

            $coverimage = ['cover' => $original];
            $description = ['description' => $request->description ];

            File::delete([
                public_path($product->cover)
            ]);

    	}

        if($request->prev_price){
            $this->validate($request, [
                'prev_price' => 'numeric|min:1'
            ]);

            $prev_price = ['prev_price' => $request->prev_price];
        }

        if($request->description){
            $this->validate($request, [
                'description' => 'numeric|min:1'
            ]);

            $description = ['description' => $request->description];
        }

        $product = $product->update(array_merge($data, $coverimage ?? [], $prev_price?? [], $description?? []));

    	return back()->with('toast_success', 'Product updated.');
    }
}
