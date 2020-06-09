<div class=" max-h-full px-2 md:w-48 ">
  <ul class="m-0 p-0 flex flex-col w-full">
    <li class="mb-3">
      <a href="{{ route('admin.dashboard') }}" class="text-gray-900 text-md font-bold flex flex-row  hover:border-green-700  px-4 py-4  border-r-2 {{ (Route::currentRouteName() == 'admin.dashboard') ? 'border-green-700' : 'border-transparent' }} items-center">
      

        <span class="ml-3 text-green-700">Dashboard</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.category') }}" class="text-gray-900 text-md font-bold flex flex-row  hover:border-green-700  px-4 py-4  border-r-2 {{ (Route::currentRouteName() == 'admin.category') ? 'border-green-700' : 'border-transparent' }} items-center">
      

        <span class="ml-3 text-green-700">Category</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.posts') }}" class="text-gray-900 text-md font-bold flex flex-row  hover:border-green-700  px-4 py-4  border-r-2 {{ (Route::currentRouteName() == 'admin.posts') ? 'border-green-700' : 'border-transparent' }} items-center">
      

        <span class="ml-3 text-green-700">Posts</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.products') }}" class="text-gray-900 text-md font-bold flex flex-row  hover:border-green-700  px-4 py-4  border-r-2 {{ (Route::currentRouteName() == 'admin.products') ? 'border-green-700' : 'border-transparent' }} items-center">
      

        <span class="ml-3 text-green-700">Products</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.users') }}" class="text-gray-900 text-md font-bold flex flex-row  hover:border-green-700  px-4 py-4  border-r-2 {{ (Route::currentRouteName() == 'admin.users') ? 'border-green-700' : 'border-transparent'}} items-center">
      

        <span class="ml-3 text-green-700">Users</span>
      </a>
    </li>
  </ul>
</div>