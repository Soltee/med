<div>
    
    <div class="flex flex-wrap items-center">

    	<div class="w-64 mx-3 rounded border-t-2 {{ ($users > 1) ? 'border-green-600' : 'border-red-600' }} px-4 py-4 flex justify-around items-center">
    		<span>{{ $users }}</span> 
    		<span> Users </span>
    	</div>

    	<div class="w-64 mx-3 rounded border-t-2 {{ ($posts > 1) ? 'border-green-600' : 'border-red-600' }} px-4 py-4 flex justify-around items-center">
    		<span>{{ $posts }}</span> 
    		<span> Posts </span>
    	</div>

        <div class="w-64 mx-3 rounded border-t-2 {{ ($products > 1) ? 'border-green-600' : 'border-red-600' }} px-4 py-4 flex justify-around items-center">
            <span>{{ $products }}</span> 
            <span> Products </span>
        </div>

    </div>

</div>
