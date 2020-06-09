@extends('layouts.admin')

@section('styles')

    {{-- <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor-insert-plugin/2.5.0/css/medium-editor-insert-plugin-frontend.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor-insert-plugin/2.5.0/css/medium-editor-insert-plugin.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8"> --}}

    {{--  Gutenberg Editor  --}}
    <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>

	<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
	<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>

	<link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">

@endsection
@section('content')
    <div class="px-3 md:px-16 flex">
        @include('inc.admin-sidebar')
        <div class="w-full">
        	{{-- {{$post}} --}}
        	<form action="{{ route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        		@csrf
        		@method('PATCH')
        		
			    <div 
	            class="flex items-center justify-between mb-3">
	            	<div class="flex items-center">
	            		<a href="{{ route('admin.posts') }}" class="text-md font-semibold leading-tight my-3 text-gray-800 mr-3"> << Back </a>
			            <h2 class="text-xl font-semibold leading-tight my-3 text-gray-800">Post | {{$post->title }}</h2>
			        </div>
		            <button type="submit" class="px-6 py-4 rounded bg-green-600 text-white hover:bg-green-500">Save</button>

		        </div>

		        <div class="w-full flex flex-col">

		        	<div class="flex flex-col mb-4">
		        		<label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
		        		<input type="text" id="title" name="title" class="px-3 py-3 rounded border-2 text-gray-700 border-transparent @error('title') 'border-red-600' @enderror" value="{{ old('title') ?? $post->title }}">

		        		@error('title')
		        			<p class="text-red-600 p-3">{{$message}}</p>
		        		@enderror

		        	</div>
		        	<div class="flex flex-col flex-wrap mb-6">
                        <label for="cover" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Image') }}:
                        </label>
			            <div class="mb-6 border border-dashed border-gray-500 relative">
						    <input type="file" name="cover" class="cursor-pointer relative block opacity-0 px-4 py-6 z-50" value="{{ old('cover') }}">
						    <div class="text-center p-3 absolute top-0 right-0 left-0 m-auto">
						        <h4>
						            Drop file anywhere to upload
						            <br/>or
						        </h4>
						        <p class="">Select File</p>
						    </div>
						</div>
						@error('cover'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
					</div>
					<img src="{{ $post->cover }}" class="mb-3 w-full h-24 object-center object-cover" />

					<div class="flex flex-col flex-wrap mb-6">
                        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Category') }}:
                        </label>
						<div class="inline-block relative w-64">
							<select name="category_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							    <option selected value="{{ $category->id }}">{{$category->name}}</option>
								@forelse($categories as $category)
							    	<option value="{{ $category->id }}"> 
							    		{{ $category->name }}
							    	</option>
							    @empty
							    @endforelse
							</select>
							<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
							    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
							</div>
						</div>
						@error('category_id'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

					<textarea id="content" name="content" hidden>
						{{-- {{ $post->lb_raw_content }} --}}
						{{$post->content}}
					</textarea>

					{{--  --}}
		        	{{-- <div class="flex flex-col mb-4">
		        		<label for="content" class="block text-gray-700 text-sm font-bold mb-4">Content</label>
		        		<textarea name="content" class="w-full editable px-3 py-3 rounded border-2 text-gray-700 border-transparent @error('content') 'border-red-600' @enderror" >
		        			{{ old('content') ?? $post->content }}
		        		</textarea>

		        		@error('content')
		        			<p class="text-red-600 p-3">{{$message}}</p>
		        		@enderror
		        	</div> --}}
		        </div>
        	</form>
		</div>

    </div>
@endsection

@section('scripts')
	<script>
		 window.addEventListener('DOMContentLoaded', () => {
	        Laraberg.init('content', { height: '600px', laravelFilemanager: false, sidebar: true })
	    });
		// var editor = new MediumEditor('.editable');
	</script>
@endsection
