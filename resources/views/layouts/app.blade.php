<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Styles -->
    @yield('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

   {{--  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script> --}}


    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8"> --}}
    <livewire:styles>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1370955982997611"
        theme_color="#005082"
        logged_in_greeting="Forward your questions. We would be happy to help you?"
        logged_out_greeting="Forward your questions. We would be happy to help you?">
    </div>



    <div id="app" class="relative my-scrollToSmooth">
        <nav x-data="{ menuOpen : false }" class="mb-3 px-6  md:px-4 md:px-16 lg:px-24  py-6">
            <div class=" mx-auto ">
                <div class=" flex items-center justify-between">
                    <div class="mr-6 flex flex-row items-center">
                        <a href="{{ url('/') }}" class="text-lg md:text-2xl lg:text-3xl font-semibold text-gray-100 no-underline">
                            <span class="text-gray-900">ConsultA</span><span class="text-blue">Doctor </span>
                        </a>
                    </div>
                    <svg x-on:click="menuOpen = true;" class="cursor-pointer text-light-blue w-8 h-8 md:hidden hover:opacity-75" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    <div class="md:flex md:flex-row hidden md:block items-center">
                        <li class="list-none mr-2 sm:px-3 md:px-2 lg:px-3">

                            <a class="text-gray-900  relative border-b-1 border-transparent hover:border-light-blue" href="/#how-it-works">{{ __('How Does it work?') }} 
                            </a>
                            
                        </li>    
                        <li class="list-none mr-2 sm:px-3 md:px-2 lg:px-3">

                            <a class="text-gray-900  relative border-b-1 {{ (Route::currentRouteName() == 'blog') ? 'border-light-blue' : 'border-transparent' }}  hover:border-light-blue" href="{{ route('blog') }}">{{ __('Our Blog') }}
                            </a>
                            
                        </li>  
                        <li class="list-none mr-2 sm:px-3 md:px-2 lg:px-3">

                            <a class="text-gray-900  relative border-b-1 border-transparent hover:border-light-blue" href="/#FAQ">{{ __('FAQ?') }}
                            
                            </a>
                            
                        </li>  
                        <li class="list-none mr-2 sm:px-3 md:px-2 lg:px-3">

                            <a class="text-gray-900  relative border-b-1 {{ (Route::currentRouteName() == 'contact') ? 'border-light-blue' : 'border-transparent' }}  hover:border-light-blue" href="{{ route('contact') }}">{{ __('Contact Us') }}
                            </a>
                            
                        </li>  
                        @auth('user')

                            <li  x-data="{ userMenu : false }" class="relative list-none">
                                <div class="flex items-center">
                                    <span class="text-gray-900 text-md ">{{ Auth::guard('user')->user()->name }}</span>
                                    <svg 
                                        x-on:click="userMenu = true;" 
                                        x-show.transition.50ms='!userMenu'
                                        class="w-8 h-8 hover:opacity-75 text-blue cursor-pointer" 
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    <svg  
                                        x-on:click="userMenu = false;"  
                                        x-show="userMenu"
                                        class="w-8 h-8 hover:opacity-75 text-blue cursor-pointer" 
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10.707 7.05L10 6.343 4.343 12l1.414 1.414L10 9.172l4.243 4.242L15.657 12z"/></svg>
                                </div>
                                <div 
                                    x-show.transition.50ms="userMenu" 
                                    class="bg-white rounded-lg shadow-2xl absolute right-0 top-0 mt-10 flex flex-col p-2">
                                    <a href="{{ route('home') }}"
                                       class="no-underline hover:underline text-gray-900 text-sm px-4 py-2 mb-2"
                                       >{{ __('Home') }}
                                    </a>
                                    <a href="{{ route('logout') }}"
                                       class="no-underline hover:underline text-gray-900 text-sm px-4 py-2 mb-2"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                             
                        @else
                            <li class="ml-2 list-none">
                                <a class="no-underline hover:bg-blue-800 text-white bg-blue text-sm px-6 py-3 rounded-lg" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endauth

                        {{-- <a class=" text-gray-900 bg-green-600 hover:bg-green-500 rounded-md text-md  px-6 py-3 mr-3" href="{{ route('shop') }}">{{ __('Shop') }}</a>
                        <div class="relative mr-3 flex items-center">
                            <a class=" text-gray-300 rounded-md text-md mr-3  px-3 py-3" href="{{ route('cart') }}">{{ __('Cart') }}</a>
                            <span class="absolute top-0 right-0 p-1 rounded-full mt-2 bg-red-600 text-white">{{ \Cart::getTotalQuantity() }}</span>
                        </div> --}}
                        {{-- <div x-data="{open : false}" class="">
                            <span x-on:click="open = true;"
                                class="text-white">Track Me!</span>
                            <div 
                                x-show.transition.100ms="open" 
                                class="">
                                <span 
                                    x-on:click="open = false;"
                                    class="absolute right-0 top-0 mt-4 mr-4 text-red-600 z-20">Close</span>
                                <div 
                                    id="mapid" 
                                    class="z-10 fixed inset-0">

                                </div>
                            </div>
                        </div> --}}
                    
                    </div>
                    <div 
                        x-show.transition.50ms="menuOpen" 
                        class="absolute inset-0 px-6 py-6 shadow-xl bg-white z-20 w-full flex flex-col  h-screen">
                        <div class="flex flex-row justify-between items-center">
                            <a href="{{ url('/') }}" class="text-lg md:text-2xl lg:text-3xl font-semibold text-gray-900 no-underline">
                                <span class="text-gray-900">ConsultA</span><span class="text-blue">Doctor </span>
                            </a>
                            <svg  x-on:click="menuOpen = false;" class="cursor-pointer text-light-blue w-8 h-8 md:hidden hover:opacity-75" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
                        </div>
                        <div class="mt-8 w-full  flex flex-col items-start">
                            <li class="list-none mb-5 md:mb-0">

                                <a class="text-gray-900  relative border-b-1 text-lg border-transparent hover:border-light-blue" href="/#how-it-works">{{ __('How Does it work?') }} 
                                </a>
                                
                            </li>    
                            <li class="list-none mb-5 md:mb-0">

                                <a class="text-gray-900  relative border-b-1 text-lg {{ (Route::currentRouteName() == 'blog') ? 'border-light-blue' : 'border-transparent' }}  hover:border-light-blue" href="{{ route('blog') }}">{{ __('Our Blog') }}
                                </a>
                                
                            </li>  
                            <li class="list-none mb-5 md:mb-0">

                                <a class="text-gray-900  relative border-b-1 text-lg border-transparent hover:border-light-blue" href="/#FAQ">{{ __('FAQ?') }}
                                
                                </a>
                                
                            </li>  
                            <li class="list-none mb-5 md:mb-0">

                                <a class="text-gray-900  relative border-b-1 text-lg {{ (Route::currentRouteName() == 'contact') ? 'border-light-blue' : 'border-transparent' }}  hover:border-light-blue" href="{{ route('contact') }}">{{ __('Contact Us') }}
                                </a>
                                
                            </li>  
                            @auth('user')
                                 <li  x-data="{ userMenu : false }" class="relative list-none">
                                <div class="flex items-center">
                                    <span class="text-gray-900 text-md pr-4">{{ Auth::guard('user')->user()->name }}</span>
                                    <svg 
                                        x-on:click="userMenu = true;" 
                                        x-show.transition.50ms='!userMenu'
                                        class="w-8 h-8 hover:opacity-75 text-blue cursor-pointer" 
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    <svg  
                                        x-on:click="userMenu = false;"  
                                        x-show.transition.50ms="userMenu"
                                        class="w-8 h-8 hover:opacity-75 text-blue cursor-pointer" 
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10.707 7.05L10 6.343 4.343 12l1.414 1.414L10 9.172l4.243 4.242L15.657 12z"/></svg>
                                </div>
                                <div 
                                    x-show.transition.50ms="userMenu" 
                                    class="bg-white rounded-lg shadow-2xl absolute right-0 top-0 mt-10 flex flex-col p-2">
                                    <a href="{{ route('home') }}"
                                       class="no-underline hover:underline text-gray-900 text-sm px-4 py-2 mb-2"
                                       >{{ __('Home') }}
                                    </a>
                                    <a href="{{ route('logout') }}"
                                       class="no-underline hover:underline text-gray-900 text-sm px-4 py-2 mb-2"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                                
                            @else
                                <li class="mb-5 list-none mt-5">
                                    <a class="no-underline w-full hover:opacity-75 text-white bg-blue text-sm px-6 py-3 rounded-lg" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endauth
                        
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        
        @include('sweetalert::alert')
        @yield('content')

        

        <div class="flex  justify-center items-center my-12">
            <div class="flex flex-col items-center text-center">
                <span class="mb-3">&copy; Copyright 2020 </span>
                <p class="">
                    By <a href="https://soltee.github.io" class="border-b-1 font-semibold border-blue"> Soltee 
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    
    <livewire:scripts>
    @yield('scripts')
    <script>
        // window.addEventListener('DOMContentLoaded', function(){
            
        //     let myMap;
        //     let marker = {
        //         prev    : null,
        //         current : null
        //     };

        //     myMap = L.map('mapid').setView([28.2026, 83.985], 13);
        //     const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors , <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>';
        //     const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        //     const tiles = L.tileLayer(tileUrl, { attribution });
        //     tiles.addTo(myMap);
        //     // cL.marker([this.location.lang, this.location.long]).addTo(tmyMap);
        //     myMap.on('click', (e)=>{addMarker(e)});

        //     function addMarker(e)
        //     {
        //         if(marker.current){
        //             marker.prev     = marker.current;
        //             myMap.removeLayer(marker.prev);                    
        //         }

        //         // this.userLocation.lat = e.latlng.lat;
        //         // this.userLocation.lng = e.latlng.lng;

        //         marker.current = new L.Marker(e.latlng, {draggable:true});
        //         myMap.addLayer(marker.current);
        //         // this.markerAdded = true;
        //         var popup = L.popup()
        //             .setLatLng([e.latlng.lat, e.latlng.lng])
        //             .setContent("<span class=''>Help! I am here.</span>")
        //             .openOn(myMap);
        //     }
        // });
    </script>
    

</body>
</html>
