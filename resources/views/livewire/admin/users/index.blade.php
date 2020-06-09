<div class="w-full">
    <div    class="w-full p-4">

        <div 
            class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight my-3 text-gray-800">Users</h2>
           {{--  <a href="{{ route('admin.posts.create') }}"  class="flex group items-center group-hover:text-green-500 rounded px-4 py-2 cursor-pointer ">
                <svg class="w-8 h-8 text-green-600 hover:text-green-500 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                <span class="text-lg text-green-600 hover:text-green-500">Add New Post</span>
            </a> --}}

        </div>
        <table class="table-auto overflow-x-scroll w-full">
          <thead>
            <tr>
              <th class=" px-4 py-2 text-left">Profile Image</th>
              <th class=" px-4 py-2 text-left">Name</th>
              <th class=" px-4 py-2 text-left">Email</th>
              <th class=" px-4 py-2 text-left">Registered at</th>
              <th class=" px-4 py-2 text-left"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
                {{-- @livewire('admin.users.destroy', ['user' => $user]) --}}
                <tr>
                  <td class="border px-4 py-2 text-left">
                  	@if($user->avatar)
                  		<img src="{{ $user->avatar }}" class="w-16 h-16 object-cover object-center rounded-lg" >
                  	@else
                  		<svg class="h-16 w-16 object-cover object-center rounded-lg text-gray-900" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>
                  	@endif
                  </td>
                 	<td class="border px-4 py-2 text-left">{{ $user->name }}</td>
                 	<td class="border px-4 py-2 text-left">{{ $user->email }}</td>
                  <td class="border px-4 py-2 text-left">{{ $user->created_at->diffForHumans() }}</td>
                  </td>
                  <td>
		            	   
                    {{-- @livewire('admin.posts.destroy', ['post' => $post]) --}}

                  </td>
                 
                </tr>
            @empty
                <tr>
                    <td> No User.</td>
                </tr>
            @endforelse
          </tbody>
        </table>


        <div class="my-3 flex justify-between items-center">
          <div class="flex items-center">
            <span class="px-2 py-2 rounded text-green-500">
              {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total()  }}
            </span>
          </div>
          <div class="flex items-center">
            @if($users->previousPageUrl())

      				<button wire:click="previousPage" class="px-2 py-2 rounded text-green-500">Prev</a>

      			@endif
      			@if($users->nextPageUrl())
      				<button wire:click="nextPage" class="px-2 py-2 rounded text-green-500">Next</a>
      			@endif

          </div>
        </div>
    </div>
</div>
