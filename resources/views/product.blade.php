@extends('layouts.app')

@section('content')

    <div class="px-3 md:px-16 flex flex-col">
      <div class="md:1/2 w-full flex h-64 justify-around">
        {{-- <div class="h-full"> --}}
          @if($product->cover)
            <img src="{{ $product->cover }}" class="flex-1 w-full object-cover object-center rounded" >
          @endif
        {{-- </div> --}}
        <div class="w-1/2 p-3 flex flex-col items-start justify-between">
          <h3 class="mb-3 text-lg md:text-xl">{{ $product->name }}</h3> 
          <div class="flex items-center mb-3">
            <span class="text-lg bg-red-500 p-3 text-white rounded-md mr-6  line-through">$ {{ $product->prev_price }}</span>
            <span class="text-lg mr-3 ">$ {{ $product->price }}</span>
          </div>

          <a href="{{ url('/cart/' . $product->id) }}" class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg">
            Add To Cart
          </a>
         
        </div>
      </div>
    </div>
@endsection

@section('scripts')




@endsection