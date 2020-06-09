@extends('layouts.app')

@section('content')
    <div class="px-6  md:px-4 md:px-16 lg:px-24  py-6 mt-5 flex flex-col md:flex-row  justify-between">
      <div class="flex flex-col">
        <div class="relative">

          <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Recent Posts') }} 
          <span class="absolute h-0.5 rounded w-16 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
          </h1>
            
        </div> 
        <div class="posts flex flex-col mt-12">
        	@foreach($posts as $post)
            <div class="post flex  flex-col md:flex-row items-center mb-16">
              <div class="w-full md:w-70 ">
                <a class="" href="{{ url('blog', $post->id . '-' . $post->slug) }}">
                  <img src="{{ $post->cover }}" class="w-full rounded-t-lg  md:rounded-t-none md:rounded-l-lg w-full object-cover bg-gray-400" alt="">
                </a>
              </div>
              <div class="md:ml-4 my-6 w-full">
                <h2 class="mb-2 text-lg sm:text-xl md:text-2xl">{{ $post->title }}</h2>
                <span class="block mb-8 text-sm text-blue-400">{{ $post->created_at->diffForHumans() }}</span>
                <a class="w-32 pr-4 text-center mt-6 text-blue border-r-2 border-transparent hover:border-blue py-2" href="{{ url('blog', $post->id . '-' . $post->slug) }}">
                   Read More ..
                </a>
              </div>
              {{-- <div class="flex-1 flex flex-col items-start  md:justify-center my-2 md:my-0 md:ml-8">

                <div class="flex flex-col mb-5">
                  <a class="" href="{{ url('blog', $post->id . '-' . $post->slug) }}">
                    <h2 class="mb-2 text-lg sm:text-xl md:text-2xl">{{ $post->title }}</h2>
                  </a>
                  <span class="block  text-sm text-blue-400">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <a class="w-32 pr-4 text-center mt-4 hover:text-blue border-r-2 border-transparent hover:border-blue py-2" href="{{ url('blog', $post->id . '-' . $post->slug) }}">
                   Read More ..
                </a>
              </div> --}}
            </div>
        	@endforeach

        </div>
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>
      </div>
      <div class="w-full md:w-48 p-3">
        <div class="flex flex-col">
          <div class="relative mb-8">

          <h1 class="text-gray-900 pt-4 font-semibold text-lg">{{ __('Categories') }} 
          <span class="absolute h-0.5 rounded w-12 bg-blue left-0 right-0 top-0 text-transparent">HAHAh</span>
          </h1>
            
        </div> 
          @forelse($categories as $category)
            <a class=" py-2 leading-7 mb-3 hover:underline hover:text-blue" href="{{ url('/blog?category=' . $category->id . '&name=' . $category->slug) }}">{{ $category->name }}</a>
          @empty
            <p class="text-4xl text-gray-600 font-semibold text-left">Comming Soon!</p>
          @endforelse
        </div>
      </div>
    </div>
@endsection

@section('scripts')

<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
    var elem2 = document.querySelector('.posts');
    var infScroll = new InfiniteScroll( '.posts', {
      path: '?page=@{{#}}',
      append: '.post',
      history: false,
      status: '.page-load-status',
    });
</script>


@endsection