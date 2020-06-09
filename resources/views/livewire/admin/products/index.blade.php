<div class="w-full">
    <div    class="w-full p-4">

        <div 
            class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight my-3 text-gray-800">Products</h2>
            <a href="{{ route('admin.products.create') }}"  class="flex group items-center group-hover:text-green-500 rounded px-4 py-2 cursor-pointer ">
                <svg class="w-8 h-8 text-green-600 hover:text-green-500 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                <span class="text-lg text-green-600 hover:text-green-500">Add New Product</span>
            </a>

        </div>
        <table class="table-auto overflow-x-scroll w-full">
          <thead>
            <tr>
              <th class=" px-4 py-2 text-left">Image</th>
              <th class=" px-4 py-2 text-left">Name</th>
              <th class=" px-4 py-2 text-left">Price</th>
              <th class=" px-4 py-2 text-left">Quantity</th>
              <th class=" px-4 py-2 text-left">Created at</th>
              <th class=" px-4 py-2 text-left"></th>
              <th class=" px-4 py-2 text-left"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($products as $product)
                <tr>
                    <td class="border px-4 py-2 text-left">
                  		<img src="{{ $product->cover }}" class="w-24 h-24 object-cover object-center" >
                    </td>
                 	<td class="border px-4 py-2 text-left">{{ $product->name }}</td>
                 	<td class="border px-4 py-2 text-left">{{ $product->price }}</td>
                 	<td class="border px-4 py-2 text-left">{{ $product->quantity }}</td>
                    <td class="border px-4 py-2 text-left">{{ $product->created_at->diffForHumans() }}
                    </td>
                    <td>
                  		<a href="{{ url('/admin/products/edit/' . $product->id) }}"  class="flex group items-center group-hover:text-green-500 rounded px-4 py-2 cursor-pointer ">
                        	<span class="text-lg text-green-600 hover:text-green-500">Update</span>
                        </a>
                    </td>
                    <td>
                       @livewire('admin.products.destroy', ['product' => $product])
                    </td>
                 
                </tr>
            @empty
                <tr>
                    <td> No Product.</td>
                </tr>
            @endforelse
          </tbody>
        </table>


        <div class="my-3 flex justify-between items-center">
          <div class="flex items-center">
            <span class="px-2 py-2 rounded text-green-500">
              {{ $first }} - {{ $last }} of {{ $total  }}
            </span>
          </div>
          <div class="flex items-center">
            @if($prev)

      				<button wire:click="previousPage" class="px-2 py-2 rounded text-green-500">Prev</a>

      			@endif
      			@if($next)
      				<button wire:click="nextPage" class="px-2 py-2 rounded text-green-500">Next</a>
      			@endif

          </div>
        </div>
    </div>
</div>
