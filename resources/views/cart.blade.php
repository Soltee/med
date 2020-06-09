@extends('layouts.app')

@section('content')
    <div class="px-3 md:px-16 flex flex-col">
      <div class=" w-full">
        <div class="mt-3 mb-6 flex justify-between items-center">
          <h1 class=" text-3xl">Cart</h1>
          <div class="flex items-center">
            <span class="mr-3 text-gray-900 text-md font-semibold">{{ $total_items }} Products</span>
            <form method="POST" action="{{ url('/cart/') }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-3 py-3 rounded bg-red-600 hover:bg-red-500 text-white">Clear Cart</button>
            </form>
          </div>
        </div>

        <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2">Total</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
        	@forelse($items as $item)
        		<tr class="">
              <td class="text-center"><img src="{{ $item->associatedModel->cover }}" class="h-16 w-16 md:h-24 md:w-24 text-center object-cover object-center rounded-lg" ></td>
              <td class="text-center">{{ $item->name }}</td>
              <td class="text-center">$ {{ $item->price }}</td>
              <td class="text-center">{{ $item->quantity }}</td>
              <td class="text-center">$ {{ $item->price * $item->quantity }}</td>
              <td class="text-center ">
                <form method="POST" action="{{ url('/cart/' . $item->id ) }}">
                  @csrf
                  @method('PATCH')
                  <div class="flex items-center">
                    <input type="number" name="quantity" class="px-2 py-3 rounded-l-lg" value="{{ $item->quantity }}">
                    <button type="submit"class="bg-red-600 hover:bg-red-500 text-white px-2 py-3 rounded-r-lg">UPDATE</button>
                  </div>
                </form>

                <form method="POST" action="{{ url('/cart/' . $item->id ) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit"class="bg-red-600 hover:bg-red-500 text-white px-4 py-3 rounded-lg">DROP</button>
                </form>
              </td>
        		</tr>
        	@empty
        		<tr class="text-2xl text-gray-600 font-semibold text-left">
              <td>My cart is empty!</td>
            </tr>
        	@endforelse


          </tbody>
        </table>

        <div class="flex items-start flex-col">
            <div class="flex items-center justify-between">
              <span class="my-2 px-3 py-3 flex-1 bg-white text-bold text-lg text-black-600 rounded-lg mr-2">SubTotal</span>
              <span class="my-2 px-3 py-3 flex-1 text-bold text-lg text-black-600 rounded-lg mr-2 text-right">$ {{ $sub }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="my-2 px-3 py-3 flex-1 bg-white text-bold text-lg text-black-600 rounded-lg mr-2">Tax</span>
              <span class="my-2 px-3 py-3 flex-1 text-bold text-lg text-black-600 rounded-lg mr-2 text-right">$ {{ $tax }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="my-2 px-3 py-3 flex-1 bg-white text-bold text-lg text-black-600 rounded-lg mr-2">Total</span>
              <span class="my-2 px-3 py-3 flex-1 text-bold text-lg text-black-600 rounded-lg mr-2 text-right">$ {{ $total }}</span>
            </div>
          </div>

      </div>
    </div>
@endsection

@section('scripts')




@endsection