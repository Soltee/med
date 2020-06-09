@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Dashboard
                </div>

                <div class="w-full p-4">
                    <table class="table-fixed overflow-x-scroll">
                      <thead>
                        <tr>
                          <th class="w-1/4 px-4 py-2 text-left">Address</th>
                          <th class="w-1/4 px-4 py-2 text-left">Latitude</th>
                          <th class="w-1/4 px-4 py-2 text-left">Longitude</th>
                          <th class="w-1/4 px-4 py-2 text-left">Created at</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($locations as $location)
                            <tr>
                              <td class="border px-4 py-2 text-left">{{ $location->address }}</td>
                              <td class="border px-4 py-2 text-left">{{ $location->latitude }}</td>
                              <td class="border px-4 py-2 text-left">{{ $location->longitude }}</td>
                              <td class="border px-4 py-2 text-left">{{ $location->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border px-4 py-2 text-center py-3"> No Locations.</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>

                    @if($total > 0)
                    <div class="my-3 flex justify-between items-center">
                      <div class="flex items-center">
                        <span class="px-2 py-2 rounded text-green-500">
                          {{$first}} - {{ $last }} of {{ $total }}
                        </span>
                      </div>
                      <div class="flex items-center">
                        <a href="{{ $prev }}" class="px-2 py-2 rounded text-green-500">
                          Prev
                        </a>
                        <a href="{{ $next }}" class="ml-3 px-2 py-2 rounded text-green-500">
                          Next
                        </a>
                      </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>

       
    </div>
@endsection
