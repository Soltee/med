@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-lg bg-lighter-blue p-12 rounded-lg">
                <div class="relative">

                      <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Login') }} 
                      <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
                      </h1>
                      
                </div> 

                <p class="text-gray-700 my-6">
                    {{ __("Don't have an account yet?") }}
                    <a class="text-gray-900 hover:text-gray-700 no-underline" href="{{ route('register.view') }}">
                        {{ __('Sign Up') }}
                    </a>
                </p>


                <form class="w-full mt-12" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="">
                        <div class="flex flex-col relative mb-8">
                            <label for="email" class="mb-2 text-gray-700">Your Email</label>
                            <input type="email" name="email" class="px-4 py-4 rounded-lg w-full @error('email') border-red-500 @enderror" placeholder="Saksyhsha" value="{{ old('email') }}" />
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col relative mb-8">
                            <label for="password" class="mb-2 text-gray-700">Your Password</label>
                            <input type="password" name="password" class="px-4 py-4 rounded-lg w-full @error('password') border-red-500 @enderror" placeholder="******" />
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex mb-6">
                            <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-col">
                            <button type="submit" class="bg-blue hover:opacity-75 text-center text-white px-6 py-4 rounded-lg text-lg">Login</button>
                          </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
