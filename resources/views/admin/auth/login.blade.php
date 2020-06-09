@extends('layouts.admin')

@section('content-full')
    <div class="h-screen w-full flex flex-col justify-center items-center bg-gray-300">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm bg-gray-900 rounded-lg">
                <div class="flex flex-col break-words bg-gray-900 border border-2 rounded-lg shadow-md">

                    <div class="font-semibold bg-gray-800 rounded-t-lg text-white py-4 px-6 mb-0">
                        {{ __('Login') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-white text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-white text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex mb-6">
                            <label class="inline-flex items-center text-sm text-white" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                        </div>

                        <div class="w-full flex items-center justify-end">

                            <button type="submit" class="bg-blue hover:opacity-75 text-gray-100 font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
