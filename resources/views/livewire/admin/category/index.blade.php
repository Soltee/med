<div class="w-full">
    <div    class="w-full p-4">

        <div 
            class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight my-3 text-gray-800">Category</h2>
            
	    	@livewire('admin.category.create')    		

        </div>
        <table class="table-auto overflow-x-scroll w-full">
          <thead>
            <tr>
              <th class=" px-4 py-2 text-left">Name</th>
              <th class=" px-4 py-2 text-left">Created at</th>
              <th class=" px-4 py-2 text-left"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $category)
                <tr>
                 	<td class="border px-4 py-2 text-left">{{ $category->name }}</td>
                  	<td class="border px-4 py-2 text-left">{{ $category->created_at->diffForHumans() }}
                  	</td>
                  	<td>
		            	   
                   		@livewire('admin.category.destroy', ['category' => $category])

                  	</td>
                 
                </tr>
            @empty
                <tr>
                    <td> No Category.</td>
                </tr>
            @endforelse
          </tbody>
        </table>

        

        <div class="my-3 flex justify-between items-center">
          <div class="flex items-center">
            <span class="px-2 py-2 rounded text-green-500">
              {{ $categories->firstItem() }} - {{ $categories->lastItem() }} of {{ $categories->total()  }}
            </span>
          </div>
          <div class="flex items-center">
            @if($categories->previousPageUrl())

      				<button wire:click="previousPage" class="px-2 py-2 rounded text-green-500">Prev</a>

      			@endif
      			@if($categories->nextPageUrl())
      				<button wire:click="nextPage" class="px-2 py-2 rounded text-green-500">Next</a>
      			@endif

          </div>
        </div>


        
    </div>
</div>
