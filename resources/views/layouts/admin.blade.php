<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('styles')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script> --}}
   


    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <livewire:styles>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        @auth('admin')
            <nav class="bg-green-600 shadow mb-3 py-6">
                <div class="container mx-auto px-6 md:px-0">
                    <div class="flex items-center justify-center">
                        <div class="mr-6">
                            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                                {{ config('app.name') }}
                            </a>
                        </div>
                        <div class="flex-1 text-right">
                                <a href="/" class="text-white text-md mr-3">
                                    Front Page
                                </a>
                                <span class="text-gray-300 text-sm pr-4">{{ Auth::guard('admin')->user()->name }}</span>

                                <a href="{{ route('admin.logout') }}"
                                   class="no-underline hover:underline text-gray-300 text-sm p-3"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                    </div>
                </div>
            </nav>
        @endauth
        @include('sweetalert::alert')
        @yield('content-full')
        @yield('content')

    
    </div>

    <!-- Scripts -->
    <livewire:scripts>
    

    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    @yield('scripts')
   


</body>
</html>
