<div class="flex items-center">
	<input id="name" type="text" class="shadow appearance-none border rounded  py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') ' border-red-500' @enderror" wire:model="name"  autofocus placeholder="Name">
	<button wire:click="store" type="submit" class=" flex-no-shrink text-white py-3 px-4 rounded bg-gray-800 hover:bg-gray-600">Add Category</button>
</div>

