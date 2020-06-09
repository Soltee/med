@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div x-data="{ tab: 'patient' }" class="flex flex-wrap justify-center">
            <div class="w-full max-w-lg bg-lighter-blue p-12 rounded-lg">
                <div class="relative">

                      <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Sign Up') }} 
                      <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
                      </h1>
                      
                </div> 

                <p class="text-gray-700 my-6">
                    {{ __("Already have an account?") }}
                    <a class="text-gray-900 hover:text-gray-700 no-underline" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>

                <div  class="flex justify-around items-center">
                    <div class="flex items-center">
                        <div 
                            x-on:click="tab = 'patient'" 
                            :class="{ 'border-green-600': tab === 'patient' }"
                            class="rounded-full h-12 w-12 border-2 border-gray-200 mr-3 cursor-pointer">
                            <svg 
                                x-show.transition.50ms="tab === 'patient'" 
                                :class="{ 'text-green-600': tab === 'patient' }" 
                                class="p-2 w-12 h-12 text-gray-900" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <span>Patient</span>
                    </div>
                    <div class="flex items-center">
                        <div 
                            x-on:click="tab = 'doctor'" 
                            :class="{ 'border-green-600': tab === 'doctor' }"
                            class="rounded-full h-12 w-12 border-2 border-gray-200 mr-3 cursor-pointer">
                            <svg 
                                x-show.transition.50ms="tab === 'doctor'" 
                                :class="{ 'text-green-600': tab === 'doctor' }"  
                                class=" p-2 w-12 h-12 text-gray-900" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <span>Doctor</span>
                    </div>
                </div>


                <livewire:auth.patient-register>
                <livewire:auth.doctor-register>

            </div>
           
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {

        });
    </script> --}}

@endsection
