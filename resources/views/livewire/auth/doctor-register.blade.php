<div>
    <form 
        wire:submit.prevent="submit"
        x-show.transition.50ms="tab === 'doctor'" 
        class="w-full mt-12" 
        {{-- method="POST" action="{{ route('register.patient') }}" --}}
        >
        {{-- @csrf --}}
        <input type="hidden" wire:model="userType" value="regPatient" placeholder="">
        <div class="">
            <div class="flex flex-col relative mb-8">
                <label for="name" class="mb-2 text-gray-700">Your Name</label>
                <input type="text" wire:model="name" class="px-4 py-4 rounded-lg w-full @error('name') border-red-500 @enderror" placeholder="Saksyhsha" value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex flex-col relative mb-8">
                <label for="email" class="mb-2 text-gray-700">Your Email</label>
                <input type="email" wire:model="email" class="px-4 py-4 rounded-lg w-full @error('email') border-red-500 @enderror" placeholder="Saksyhsha" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col relative mb-8">
                <label for="password" class="mb-2 text-gray-700">Your Password</label>
                <input type="password" wire:model="password" class="px-4 py-4 rounded-lg w-full @error('password') border-red-500 @enderror" placeholder="*********"  />
                @error('password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col relative mb-8">
                <label for="password-confirm" class="mb-2 text-gray-700">Confirm Password</label>
                <input id="password-confirm" type="password" wire:model="password_confirmation" class="px-4 py-4 rounded-lg w-full @error('password') border-red-500 @enderror" placeholder="*********" />
             
            </div>

            <div class="flex flex-col">
                <button id="patientSubmit" type="submit" class="bg-blue hover:opacity-75 text-center text-white px-6 py-4 rounded-lg text-lg">Register as a Doctor</button>
              </div>
        </div>
    </form>
</div>
