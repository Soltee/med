@extends('layouts.app')

@section('content')
    <div class="px-3 md:px-24 py-3 md:py-6 mt-10 flex flex-col  justify-center items-center">
      <div class="flex-1 flex flex-col md:flex-row items-center justify-center">
        <div class="px-10 py-6 w-90 bg-lighter-blue mr-3 rounded-lg">
          <div class="relative">

              <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Have any Questions?') }} 
              <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
              </h1>
              
          </div> 

          <form action="" method="get" accept-charset="utf-8">
            
            @csrf
            <div class="mt-12">
              <div class="flex flex-col relative mb-8">
                <label for="name" class="absolute top-0 left-0 ml-4 -mt-2">Your name</label>
                <input type="text" name="name" class="px-4 pb-3 pt-6 rounded-lg w-full" placeholder="Saksyhsha" />
                
              </div>
              <div class="flex flex-col relative mb-8">
                <label for="email" class="absolute top-0 left-0 ml-4 -mt-2">Your email</label>
                <input type="email" name="email" class="px-4 pb-3 pt-6 rounded-lg w-full" placeholder="skaysha@gmail.com" />
                
              </div>
              <div class="flex flex-col relative mb-8">
                <label for="message" class="absolute top-0 left-0 ml-4 -mt-2">Your message</label>
                <textarea  name="message" rows="6" class="px-4 pb-3 pt-6 rounded-lg w-full" placeholder="Tell us your problem...">
                  
                </textarea>

                
              </div>

              <div class="flex flex-col">
                <button type="submit" class="bg-blue hover:bg-blue-800 text-center text-white px-6 py-4 rounded-lg text-lg">Send Now</button>
              </div>
            </div>
          </form>
        </div>

        <div class="my-10 md:my-0 flex flex-col p-3">
          <h2 class="text-lg sm:text-xl md:text-2xl mb-8">Services Info</h2>
          <div class="flex items-center mb-2">
            <div class="rounded-full bg-gray-300 p-3 mr-3">
              <svg fill="currentColor" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/></svg>
            </div>
            <span class="text-md font-semibold text-gray-500">+977 98774494944</span>
          </div>
          <div class="flex items-center">
            <div class="rounded-full bg-gray-300 p-3 mr-3">
              <svg  class="w-6 h-6"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </div>
            <span class="text-md font-semibold text-gray-500">demo@company.com</span>
          </div>

        </div>
    </div>
@endsection

@section('scripts')




@endsection