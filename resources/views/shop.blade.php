@extends('layouts.app')

@section('content')

    <div class="px-3 md:px-16 flex flex-col">
      <div class=" w-full">
        <div class="mt-3 mb-6 flex justify-between items-center">
          <h1 class="text-lg md:text-2xl">Shop</h1>
        </div>
        <div class="flex flex-wrap">
          @forelse($products as $product)
            <div class="w-full md:w-1/2 lg:w-1/3 px-3 flex flex-col mb-8 shadow-xl bg-white">
              <a href="{{ url('/shop/' . $product->id . '-' . $product->slug()) }}" class="no-underline bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition flex-1 flex flex-col overflow-hidden">
                <div>
                  @if($product->cover)
                    <img src="{{ $product->cover }}" class="w-full h-48 object-cover object-center rounded" >
                  @endif
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                  <h3 class="font-display text-black no-underline mb-4">
                    {{ $product->name }}
                  </h3>
                  <div class="flex items-center">
                    <span class="text-lg bg-red-500 p-3 text-white rounded-md mr-6  line-through">$ {{ $product->prev_price }}</span>
                    <span class="text-lg mr-3 ">$ {{ $product->price }}</span>
                  </div>
                  {{-- <div>
                    <p class="inline-flex items-center">
                      {{ \Illuminate\Support\Str::limit($product->description, 200, $end='...') }}
                    </p>
                  </div> --}}
                </div>
              </a>
            </div>
          @empty
            <p class="text-4xl text-gray-600 font-semibold text-left">Comming Soon!</p>
          @endforelse
        </div>
          			
      	<div class="flex items-center justify-between mt-4 mb-8">
          <div class="">
            Showing {{ $first }} - {{ $last }} of {{ $total }}
          </div>
          <div class="">
            @if($prev)
      			  <a href="{{ $prev }}"  class="px-4 py-2  text-white rounded bg-green-600 hover:bg-green-500">Prev</a>
            @else
              <span  class="px-4 py-2  text-white rounded bg-green-500 ">Prev</span> 
      			@endif
      			@if($next)
      				<a href="{{ $next }}" class="px-4 py-2  text-white rounded bg-green-600 hover:bg-green-500">Next</a>
            @else 
              <span  class="px-4 py-2  text-white rounded bg-green-500 ">Next</span> 
      			@endif
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')




@endsection