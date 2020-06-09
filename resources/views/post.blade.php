@extends('layouts.app')

@section('title', '| ' .  $post->title)

@section('content')
    <div class="px-6  md:px-4 md:px-16 lg:px-24  py-6  flex flex-col md:flex-row">
      	<div class="flex-1 pr-3">
      		<div  class="flex items-center mb-10">
      			<a href="{{ route('blog') }}" class="text-blue border-b-1 border-transparent hover:border-blue mr-6">Blog</a>
	      		<div class="relative">

		          <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ $post->title }} 
		          <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
		          </h1>
		            
		        </div>
	        </div> 
      		<div class="w-full mb-10">
		    	@if($post->cover)
		      		<img src="{{ $post->cover }}" class="w-full h-40 object-cover object-center rounded" >
		      	@endif
		    			
		        <p class="text-green-800 font-semibold my-6">{!! $post->content !!}</p>
		    </div>
	        <div class="w-full mt-16 mb-8">
		        <div class="flex flex-col">
		          	<div class="relative mb-2">

			          	<h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Recommended') }} 
			          		<span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
			          	</h1>
			            
			        </div> 
			        <div class="flex flex-wrap justify-around items-center my-8">
						@forelse($relatedPost as $related)
			        	<div class="w-full sm:w-1/2 md:w-1/3  flex flex-col items-center  mb-4 p-3">
			        		<div class="w-full h-40"> 
			        			<img src="/img/1.png" class="rounded-lg w-full h-full  object-cover bg-gray-400" alt="">
			        		</div>
			        		<div class="my-6 w-full">
			        			<h2 class="mb-2 text-lg sm:text-xl md:text-2xl">{{ $related->title }}</h2>
			        			<span class="block mb-8 text-sm text-blue-400">{{ $related->created_at->diffForHumans() }}</span>
			        			<a class="w-32 pr-4 text-center mt-6 text-blue border-r-2 border-transparent hover:border-blue py-2" href="{{ url('blog', $related->id . '-' . $related->slug) }}">
			        				 Read More ..
			        			</a>
			        		</div>
			        	</div>
			        	@empty
		        			<p class="text-4xl text-gray-600 font-semibold text-left">Comming Soon!</p>
		        		@endforelse
					    
					</div>
		          	
		        </div>
		   	</div>
	    </div>

	    <div class="w-full md:w-64 p-3">
	        <div class="flex flex-col">
	            <div class="relative mb-6">

		          <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Categories') }} 
		          <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
		          </h1>
		            
		        </div> 

	          	@forelse($categories as $category)
		            <a class=" py-2 leading-7 mb-3 hover:underline hover:text-blue" href="{{ url('/blog?category=' . $category->id . '&name=' . $category->slug) }}">{{ $category->name }}</a>
		          @empty
		            <p class="text-4xl text-gray-600 font-semibold text-left">Comming Soon!</p>
		          @endforelse
	        </div>
	   	</div>
        
    </div>
@endsection

@section('scripts')




@endsection