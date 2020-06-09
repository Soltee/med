@extends('layouts.admin')

@section('content')
    <div class="px-3 md:px-16 flex">
        @include('inc.admin-sidebar')
        <div class="w-full">
        	<form action="{{ route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        		@csrf
        		@method('PATCH')
        		
			    <div 
	            class="flex items-center justify-between mb-3">
	            	<div class="flex items-center">
	            		<a href="{{ route('admin.products') }}" class="text-md font-semibold leading-tight my-3 text-gray-800 mr-3"> << Back </a>
			            <h2 class="text-xl font-semibold leading-tight my-3 text-gray-800">{{ $product->name }}</h2>
			        </div>
		            <button type="submit" class="px-6 py-4 rounded bg-green-600 text-white hover:bg-green-500">Update</button>

		        </div>

		        <div class="w-full flex flex-col">

		        	<div class="flex flex-col mb-4">
		        		<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
		        		<input type="text" id="name" name="name" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent border-2 border-green-300 hover:border-green-600 @error('name') 'border-red-600' @enderror" value="{{ old('name') ?? $product->name }}">

		        		@error('name')
		        			<p class="text-red-600 p-3">{{$message}}</p>
		        		@enderror
		        	</div>
		        	<div class="flex flex-col flex-wrap mb-6">
                        <label for="cover" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Image') }}:
                        </label>
			            <div class="mb-6 border border-dashed border-gray-500 relative">
						    <input type="file" name="cover" class="cursor-pointer relative block opacity-0 px-4 py-6 z-50" value="{{ old('cover') }}" required>
						    <div class="text-center p-3 absolute top-0 right-0 left-0 m-auto">
						        <h4>
						            Drop file anywhere to upload
						            <br/>or
						        </h4>
						        <p class="">Select File</p>
						    </div>
						</div>
						@error('cover'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
					</div>

					<div class="flex flex-col sm:flex-row mb-4">
						<div class="flex-1 sm:mr-3 flex flex-col">
			        		<label for="prrev_price" class="block text-gray-700 text-sm font-bold mb-2">Previous Price ($)</label>
			        		<input type="text" id="price" name="prev_price" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent border-2 border-green-300 hover:border-green-600 @error('prev_price') 'border-red-600' @enderror" value="{{ old('prev_price')?? $product->prev_price }}">

			        		@error('prev_price')
			        			<p class="text-red-600 p-3">{{$message}}</p>
			        		@enderror
			        	</div>
						<div class="flex-1 sm:ml-3 flex flex-col">
			        		<label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price ($)</label>
			        		<input type="text" id="price" name="price" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent border-2 border-green-300 hover:border-green-600 @error('price') 'border-red-600' @enderror" value="{{ old('price')?? $product->price }}">

			        		@error('price')
			        			<p class="text-red-600 p-3">{{$message}}</p>
			        		@enderror
			        	</div>
			     
			        </div>
		        	<div class="flex flex-col mb-4">
		        		<label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
		        		<input type="text" id="quantity" name="quantity" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent border-2 border-green-300 hover:border-green-600 @error('quantity') 'border-red-600' @enderror" value="{{ old('quantity')?? $product->quantity }}">

		        		@error('quantity')
		        			<p class="text-red-600 p-3">{{$message}}</p>
		        		@enderror
		        	</div>
		        	<div class="flex flex-col mb-4">
		        		<label for="descrption" class="block text-gray-700 text-sm font-bold mb-2">Descrption</label>
						<textarea id="content" name="description" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent border-2 border-green-300 hover:border-green-600 @error('description') 'border-red-600' @enderror">
							{{ old('description')?? $product->description }}
						</textarea>
					</div>

		        </div>
        	</form>
		</div>

    </div>
@endsection
