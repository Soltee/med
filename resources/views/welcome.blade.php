@extends('layouts.app')

@section('head')



@endsection
@section('content')
    <div>

    	<div class="flex items-center relative h-64 sm:h-70 md:h-74 overflow-hidden" 
			{{--     		style="background-image: url('/img/hero.jpg') no-repeat; object-fit:  cover; "--}}    		
			>

    		<div class="absolute left-0 px-6  md:px-4 md:px-16 lg:px-24  py-6 flex flex-col mt-0 md:mt-12 z-10">
    			<h1 class="text-3xl sm:text-4xl md:text-6xl mb-2 md:mb-4 font-black">We help people</h1>
    			<h1 class="text-3xl sm:text-4xl md:text-6xl mb-8 font-black md:leading-10"> consult a doctor</h1>
    			<a class="w-40 md:w-48 text-center no-underline hover:bg-light-blue text-white bg-dark-blue text-sm md:text-lg p-4 md:p-6 rounded-lg" href="{{ route('register.view') }}">{{ __('Sign up') }}</a>
    		</div>
    		<div class="w-64 text-transparent">
    			Object
    		</div>
    		<img  class="mt-10 md:mt-16 opacity-75 h-full ml-10 md:ml-0 flex-1 bg-center object-top object-cover" src="{{ asset('/img/hero.jpg') }}" alt="Hero Background">
    	</div>


    	<div id="how-it-works" class="px-6  md:px-4 md:px-16 lg:px-24  py-6 mt-16">
    		<div class="relative">

	            <h1 class="text-gray-900 pt-4 font-semibold text-lg">
	            	<a  href="#how-it-works">{{ __('How Does it work?') }}</a>
	            <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
	            </h1>
	            
	        </div> 

	        <div class="flex flex-wrap justify-around items-center mt-8">
				<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 flex flex-col sm:flex-row md:flex-col items-center my-8 ">
				  	<div class="mb-3 rounded-full ">
	        			<img src="/img/signup.svg" class="rounded-full object-center w-40 h-40 md:w-32 md:h-32 p-3 md:p-0" alt="">
	        		</div>
	        		<h3 class="text-lg">Sign Up an Account.</h3>
			    </div>
			    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 flex flex-col sm:flex-row md:flex-col items-center my-8 ">
			  	 	<div class="mb-3 rounded-full ">
	        			<img src="/img/location.svg" class="rounded-full object-center w-40 h-40 md:w-32 md:h-32 p-3 md:p-0" alt="">
	        		</div>
	        		<h3 class="text-lg"> Give your location .</h3>	
			    </div>
			    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 flex flex-col sm:flex-row md:flex-col items-center my-8 ">
			  		<div class="mb-3 rounded-full ">
	        			<img src="/img/form.svg" class="rounded-full object-center w-40 h-40 md:w-32 md:h-32 p-3 md:p-0" alt="">
	        		</div>
	        		<h3 class="text-lg">Fill out a form.</h3>
			    </div>
			    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 flex flex-col sm:flex-row md:flex-col items-center my-8 ">
			  		<div class="mb-3 rounded-full ">
	        			<img src="/img/feedback.svg" class="rounded-full object-center w-40 h-40 md:w-32 md:h-32 p-3 md:p-0" alt="">
	        		</div>
	        		<h3 class="text-lg">Get prescriptions.</h3>	 
			    </div>
			</div>

    	</div>
        

        <div  class="px-6  md:px-4 md:px-16 lg:px-24  py-6 mt-24">
    		<div class="relative">

	            <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('From our Blog') }} 
	            <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
	            </h1>
	            
	        </div> 

	         <div class="flex flex-wrap justify-around items-center my-8">
				@forelse($posts as $post)
	        	<div class="w-full sm:w-1/2 md:w-1/3  flex flex-col items-center  mb-4 p-3">
	        		<div class="w-full h-40"> 
	        			<img src="/img/1.png" class="rounded-lg w-full h-full  object-cover bg-gray-400" alt="">
	        		</div>
	        		<div class="my-6 w-full">
	        			<h2 class="mb-2 text-lg sm:text-xl md:text-2xl">{{ $post->title }}</h2>
	        			<span class="block mb-8 text-sm text-blue-400">{{ $post->created_at->diffForHumans() }}</span>
	        			<a class="w-32 pr-4 text-center mt-6 hover:text-blue border-r-2 border-transparent hover:border-blue py-2" href="{{ url('blog', $post->id . '-' . $post->slug) }}">
	        				 Read More ..
	        			</a>
	        		</div>
	        	</div>
	        	@empty
        			<p class="text-4xl text-gray-600 font-semibold text-left">Comming Soon!</p>
        		@endforelse
			    
			</div>


	        <a class=" no-underline hover:bg-blue text-white bg-dark-blue  text-lg p-4 md:p-5 rounded-lg font-black px-10" href="{{ route('blog') }}">{{ __('Read All') }}</a>
	    </div>

	    <div id="FAQ" class="px-6  md:px-4 md:px-16 lg:px-24  py-6 mt-24">
    		<div class="relative">

	            <h1 id="FAQ" class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Frequently Asked Questions ? (FAQ)') }} 
	            <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
	            </h1>
	            
	        </div> 
	        <img src="/img/FAQ.svg" class="py-2 w-full md:hidden object-cover" alt="">

	        <div class="flex flex-row items-center">
		        <div class="flex flex-col mt-16 flex-1 md:mr-24">
		        	<div class="flex flex-col mb-12">
		        		<h2 class="text-xl sm:text-2xl md:text-3xl text-blue font-bold">What is GetADoctor?</h2>
		        		<p class="text-medium font-semibold mt-5 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua commodo.</p>
		        	</div>
		        	<div class="flex flex-col mb-12">
		        		<h2 class="text-xl sm:text-2xl md:text-3xl text-blue font-bold">Does it cover emergency cased?</h2>
		        		<p class="text-medium font-semibold mt-5 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua commodo.</p>
		        	</div>
		        	<div class="flex flex-col mb-12">
		        		<h2 class="text-xl sm:text-2xl md:text-3xl text-blue font-bold">What payment services is included?</h2>
		        		<p class="text-medium font-semibold mt-5 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua commodo.</p>
		        	</div>
		        	<div class="flex flex-col mb-12">
		        		<h2 class="text-xl sm:text-2xl md:text-3xl text-blue font-bold">Can they be trusted?</h2>
		        		<p class="text-medium font-semibold mt-4 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua commodo.</p>
		        	</div>
		        </div>
		        <div class="hidden md:block relative h-64 w-64 opacity-50 z-10">

		        	<img src="/img/FAQ.svg" class="z-0 absolute inset-0  w-full hidden md:block object-cover" alt="">
		        </div>
		    </div>

    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/bfiessinger/scrollToSmooth@latest/dist/scrolltosmooth.min.js"></script>
<script>

	// let smoothScroll = new scrollToSmooth(document.querySelector('.my-scrollToSmooth'));
	let smoothScroll = new scrollToSmooth('a', {
		targetAttribute: 'href',
		duration: 400,
		durationRelative: false,
		durationMin: false,
		durationMax: false,
		easing: 'easeOutCubic',
		onScrollStart: (data) => { console.log(data); },
		onScrollUpdate: (data) => { console.log(data); },
		onScrollEnd: (data) => { console.log(data); },
		fixedHeader: null
	});

	smoothScroll.init();	
</script>


@endsection