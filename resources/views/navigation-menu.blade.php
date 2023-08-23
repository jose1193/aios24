   <header class="">


       <!-- nav - start -->
       <nav class="relative px-7 py-7 flex justify-between items-center bg-white">
           @if (Route::has('login'))
               @auth
                   <a class="text-3xl font-bold leading-none" href="{{ route('dashboard') }}">
                       <img src="{{ asset('img/logo.jpg') }}" class="h-16 -ml-3" alt="logo">
                   </a>
               @else
                   <a class="text-3xl font-bold leading-none" href="{{ route('home') }}">
                       <img src="{{ asset('img/logo.jpg') }}" class="h-16 -ml-3" alt="logo">
                   </a>
               @endif
           @endauth

           <div class="flex items-center md:order-2 ">
               <livewire:notifications-messages />
               @auth
                   @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                       <button type="button"
                           class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                           id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                           data-dropdown-placement="bottom">
                           <span class="sr-only">Open user menu</span>

                           <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                               alt="{{ Auth::user()->name }}">
                       </button>
                   @else
                       <span class="inline-flex rounded-md">
                           <button type="button"
                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">

                               {{ Auth::user()->name }}

                               <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                   viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                               </svg>
                           </button>
                       </span>
                   @endif

                   <!-- Dropdown menu -->
                   <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                       id="user-dropdown">
                       <div class="px-4 py-3">
                           <span class="block text-sm text-gray-900 dark:text-white"> {{ Auth::user()->name }}
                               {{ Auth::user()->lastname }}</span>
                           <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                               {{ Auth::user()->email }}</span>
                       </div>
                       <ul class="py-2" aria-labelledby="user-menu-button">
                           <li>
                               <a href="{{ route('profile.show') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Profile') }}</a>
                           </li>
                           @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                               <li>
                                   <a href="{{ route('api-tokens.index') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                       {{ __('API Tokens') }}</a>
                               </li>
                           @endif
                           <div class="border-t border-gray-200"></div>
                           <!-- Authentication -->
                           <form method="POST" action="{{ route('logout') }}" x-data>
                               @csrf
                               <li>
                                   <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                       {{ __('Log Out') }}</a>
                               </li>
                           </form>

                       </ul>
                   </div>
               @endauth
               <!-- LENGUAGE BUTTON -->
               <div class="hidden lg:inline-block">
                   <div class=" flex items-center md:order-2 pl-3">
                       <button type="button" data-dropdown-toggle="language-dropdown-menu"
                           class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                           <img class="w-8 h-8 mr-2 rounded-full"
                               src="https://img.icons8.com/color/48/null/spain2-circular.png" />
                           (ES)
                       </button>
                       <!-- Dropdown -->
                       <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                           id="language-dropdown-menu">
                           <ul class="py-2 font-medium" role="none">
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <img class="w-4 h-4 mr-2 rounded-full"
                                               src="https://img.icons8.com/color/48/null/spain2-circular.png" />
                                           Español
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                               viewBox="0 0 512 512">
                                               <g fill-rule="evenodd">
                                                   <g stroke-width="1pt">
                                                       <path fill="#bd3d44"
                                                           d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                           transform="scale(3.9385)" />
                                                       <path fill="#fff"
                                                           d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                           transform="scale(3.9385)" />
                                                   </g>
                                                   <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                                   <path fill="#fff"
                                                       d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                       transform="scale(3.9385)" />
                                               </g>
                                           </svg>
                                           English (US)
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-de"
                                               viewBox="0 0 512 512">
                                               <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                                               <path d="M0 0h512v170.7H0z" />
                                               <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                                           </svg>
                                           Deutsch
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-it"
                                               viewBox="0 0 512 512">
                                               <g fill-rule="evenodd" stroke-width="1pt">
                                                   <path fill="#fff" d="M0 0h512v512H0z" />
                                                   <path fill="#009246" d="M0 0h170.7v512H0z" />
                                                   <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                                               </g>
                                           </svg>
                                           Italiano
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icon-css-cn"
                                               viewBox="0 0 512 512">
                                               <defs>
                                                   <path id="a" fill="#ffde00"
                                                       d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                               </defs>
                                               <path fill="#de2910" d="M0 0h512v512H0z" />
                                               <use width="30" height="20"
                                                   transform="matrix(76.8 0 0 76.8 128 128)" xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-121 142.6 -47) scale(25.5827)"
                                                   xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-98.1 198 -82) scale(25.6)" xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-74 272.4 -114) scale(25.6137)"
                                                   xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="matrix(16 -19.968 19.968 16 256 230.4)"
                                                   xlink:href="#a" />
                                           </svg>
                                           中文 (繁體)
                                       </div>
                                   </a>
                               </li>
                           </ul>
                       </div>

                   </div>
               </div>
               <!-- END  LENGUAGE BUTTON -->
               <div class="lg:hidden">

                   <button class="navbar-burger flex items-center text-green-600 p-3">
                       <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <title>Mobile menu</title>
                           <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                       </svg>
                   </button>
               </div>
           </div>



           <ul class="hidden max-w-screen-xl lg:flex flex-wrap items-center justify-between mx-auto p-4 space-x-3">
               @if (Route::has('login'))
                   @auth
                       <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                               href="{{ route('dashboard') }}">Home</a></li>
                   @else
                       <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                               href="{{ route('home') }}">Home</a></li>
                   @endauth
               @endif


               </li>
               <li class="text-gray-300">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                       class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                   </svg>
               </li>
               <li><a class="text-md   text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                       href="{{ route('about') }}">Nosotros</a></li>
               <li class="text-gray-300">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                       class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                   </svg>
               </li>
               <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                       href="{{ route('solutions') }}">Servicios</a></li>
               <li class="text-gray-300">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                       class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                   </svg>
               </li>
               <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                       href="{{ route('prices') }}">Precios</a></li>
               <li class="text-gray-300">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                       class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                   </svg>
               </li>
               @auth
                   @can('manage admin')
                       <li>
                           <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                               class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-bold text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Management
                               <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                   xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd"
                                       d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                       clip-rule="evenodd"></path>
                               </svg></button>
                           <!-- Dropdown menu -->
                           <div id="dropdownNavbar"
                               class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                               <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                   aria-labelledby="dropdownLargeButton">
                                   <li>
                                       <a href="{{ route('users') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Usuarios') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('buckets') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Buckets') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('plans') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Planes') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('purchased-plans-users') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Resumen Publicaciones') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('users-renewals-plans') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Renovaciones Planes') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('transactions') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Transactions') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('properties') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Propiedades') }}</a>
                                   </li>

                                   <li>
                                       <a href="{{ route('emailadmin') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Admin Email ') }}</a>
                                   </li>

                                   <li>
                                       <a href="{{ route('contactforms') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('User Contact') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('posts') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Posts Manage') }}</a>
                                   </li>
                                   <li>
                                       <a href="{{ route('estatus') }}"
                                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                           {{ __('Estatus Anuncios') }}</a>
                                   </li>
                               </ul>

                           </div>
                       </li>
                       <li class="text-gray-300">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                               class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                           </svg>
                       </li>
                   @endcan
                   <li>
                       <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                           class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-bold text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Anuncios
                           <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                               xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd"
                                   d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                   clip-rule="evenodd"></path>
                           </svg></button>
                       <!-- Dropdown menu -->
                       <div id="dropdownNavbar2"
                           class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                           <ul class="relative z-20 py-2 text-sm text-gray-700 dark:text-gray-400"
                               aria-labelledby="dropdownLargeButton">
                               <li>
                                   <a href="{{ route('publish') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                       {{ __('Publicar') }}</a>
                               </li>
                               <li>
                                   <a href="{{ route('published') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Mis Anuncios') }}</a>
                               </li>
                               <li>
                                   <a href="{{ route('myplans') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                       {{ __('Mis Planes') }}</a>
                               </li>
                               <li>
                                   <a href="{{ route('my-renewals-plans') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                       {{ __('Mis Renovaciones') }}</a>
                               </li>
                               <li>
                                   <a href="{{ route('show-favorites') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                       {{ __('Mis Favoritos') }}</a>
                               </li>


                           </ul>

                       </div>
                   </li>
                   <li class="text-gray-300">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                           class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                       </svg>
                   </li>

               @endauth

               <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                       href="{{ route('contact') }}">Contacto</a></li>

               <li class="text-gray-300">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                       class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                   </svg>
               </li>
               <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-500 font-bold"
                       href="{{ route('blog') }}">Blog</a></li>

           </ul>

           @if (Route::has('login'))
               @auth
               @else
                   <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 transition duration-500 ease-in-out bg-gray-50
                     hover:bg-green-200 text-sm text-gray-900 font-bold  rounded-xl "
                       href="{{ route('login') }}">Ingresar</a>
                   @if (Route::has('register'))
                       <a class="hidden lg:inline-block py-2 px-6 bg-green-600 transition duration-500 ease-in-out hover:bg-green-500 text-sm text-white font-bold rounded-xl "
                           href="{{ route('register') }}">Publicar</a>
                   @endif
               @endauth
           @endif

       </nav>
       <div class="navbar-menu relative z-50 hidden">
           <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
           <nav
               class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
               <div class="flex items-center mb-8">
                   @if (Route::has('login'))
                       @auth
                           <a class="mr-auto text-3xl font-bold leading-none" href="{{ route('dashboard') }}">
                               <img src="{{ asset('img/logo.jpg') }}" class="h-12" alt="logo">

                           </a>
                       @else
                           <a class="mr-auto text-3xl font-bold leading-none" href="{{ route('home') }}">
                               <img src="{{ asset('img/logo.jpg') }}" class="h-12" alt="logo">

                           </a>
                       @endif
                   @endauth

                   <button class="navbar-close">
                       <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M6 18L18 6M6 6l12 12"></path>
                       </svg>
                   </button>
               </div>
               <div>
                   <ul>
                       <li class="mb-1">
                           @if (Route::has('login'))
                               @auth
                                   <a class="block p-4 text-sm font-semibold text-green-600
                                     hover:bg-green-100 transition duration-500 ease-in-out hover:text-green-700  rounded"
                                       href="{{ route('dashboard') }}">Home</a>
                               @else
                                   <a class="block p-4 text-sm font-semibold text-green-600
                                     hover:bg-green-100 transition duration-500 ease-in-out hover:text-green-700  rounded"
                                       href="{{ route('home') }}">Home</a>
                               @endif
                           @endauth

                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700  rounded"
                               href="{{ route('about') }}">Nosotros</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                               href="{{ route('solutions') }}">Servicios</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                   transition duration-500 ease-in-out  hover:text-green-700 rounded"
                               href="{{ route('prices') }}">Precios</a>
                       </li>
                       @auth
                           @can('manage admin')
                               <li class="mb-1">
                                   <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarMobile"
                                       class="flex items-center justify-between w-full p-4  font-semibold text-sm text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Management
                                       <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path fill-rule="evenodd"
                                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                               clip-rule="evenodd"></path>
                                       </svg></button>
                                   <!-- Dropdown menu -->
                                   <div id="dropdownNavbarMobile"
                                       class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                       <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                           aria-labelledby="dropdownLargeButton">
                                           <li>
                                               <a href="{{ route('users') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Usuarios') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('buckets') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Buckets') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('plans') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Planes') }}</a>
                                           </li>

                                           <li>
                                               <a href="{{ route('users-renewals-plans') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Renovaciones Planes') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('purchased-plans-users') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Resumen Publicaciones') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('transactions') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Transactions') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('properties') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Propiedades') }}</a>
                                           </li>

                                           <li>
                                               <a href="{{ route('emailadmin') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Admin Email ') }}</a>
                                           </li>

                                           <li>
                                               <a href="{{ route('contactforms') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('User Contact') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('posts') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Posts Manage') }}</a>
                                           </li>
                                           <li>
                                               <a href="{{ route('estatus') }}"
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                   {{ __('Estatus Anuncios') }}</a>
                                           </li>
                                       </ul>

                                   </div>
                               </li>
                           @endcan
                           <li class="mb-1">
                               <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarMobile2"
                                   class="flex items-center justify-between w-full p-4 font-semibold text-sm text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Anuncios
                                   <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                           d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                           clip-rule="evenodd"></path>
                                   </svg></button>
                               <!-- Dropdown menu -->
                               <div id="dropdownNavbarMobile2"
                                   class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                   <ul class="relative z-20 py-2 text-sm text-gray-700 dark:text-gray-400"
                                       aria-labelledby="dropdownLargeButton">
                                       <li>
                                           <a href="{{ route('publish') }}"
                                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                               {{ __('Publicar') }}</a>
                                       </li>
                                       <li>
                                           <a href="{{ route('published') }}"
                                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Mis Anuncios') }}</a>
                                       </li>
                                       <li>
                                           <a href="{{ route('myplans') }}"
                                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                               {{ __('Mis Planes') }}</a>
                                       </li>

                                       <li>
                                           <a href="{{ route('my-renewals-plans') }}"
                                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                               {{ __('Mis Renovaciones') }}</a>
                                       </li>
                                       <li>
                                           <a href="{{ route('show-favorites') }}"
                                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                               {{ __('Mis Favoritos') }}</a>
                                       </li>


                                   </ul>

                               </div>
                           </li>


                       @endauth

                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                               href="{{ route('contact') }}">Contacto</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                               href="{{ route('blog') }}">Blog</a>
                       </li>
                       <li>

                       </li>
                   </ul>
               </div>
               <div class="mt-auto">
                   <div class="pt-6">

                       @if (Route::has('login'))
                           @auth
                               <a href="{{ route('profile.show') }}"
                                   class=" block px-4 py-3 mb-2 leading-loose text-xs text-center
                                 text-white font-semibold bg-green-600 transition duration-500 ease-in-out hover:bg-green-700  rounded-xl ">Profile</a>
                           @else
                               <a class="block px-4 py-3 mb-3  text-xs text-center font-semibold leading-none bg-gray-50
                                transition duration-500 ease-in-out  hover:bg-green-100 rounded-xl"
                                   href="{{ route('login') }}">Ingresar</a>
                               <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center
                                 text-white font-semibold bg-green-600 transition duration-500 ease-in-out hover:bg-green-700  rounded-xl"
                                   href="{{ route('register') }}">Publicar</a>
                           @endif
                       @endauth



                       <!-- START LENGUAGE BUTTON -->
                       <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarLenguage"
                           class="flex items-center justify-between w-full py-2 pl-3 pr-4
                                         p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded">
                           <img class="w-4 h-4 mr-2 rounded-full"
                               src="https://img.icons8.com/color/48/null/spain2-circular.png" />
                           Español
                           <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                               xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd"
                                   d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                   clip-rule="evenodd"></path>
                           </svg></button>
                       <!-- Dropdown menu -->
                       <div id="dropdownNavbarLenguage"
                           class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                           <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                               aria-labelledby="dropdownLargeButton">
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <img class="w-4 h-4 mr-2 rounded-full"
                                               src="https://img.icons8.com/color/48/null/spain2-circular.png" />
                                           Español
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                               viewBox="0 0 512 512">
                                               <g fill-rule="evenodd">
                                                   <g stroke-width="1pt">
                                                       <path fill="#bd3d44"
                                                           d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                           transform="scale(3.9385)" />
                                                       <path fill="#fff"
                                                           d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                           transform="scale(3.9385)" />
                                                   </g>
                                                   <path fill="#192f5d" d="M0 0h98.8v70H0z"
                                                       transform="scale(3.9385)" />
                                                   <path fill="#fff"
                                                       d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                       transform="scale(3.9385)" />
                                               </g>
                                           </svg>
                                           English (US)
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-de"
                                               viewBox="0 0 512 512">
                                               <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                                               <path d="M0 0h512v170.7H0z" />
                                               <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                                           </svg>
                                           Deutsch
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-it"
                                               viewBox="0 0 512 512">
                                               <g fill-rule="evenodd" stroke-width="1pt">
                                                   <path fill="#fff" d="M0 0h512v512H0z" />
                                                   <path fill="#009246" d="M0 0h170.7v512H0z" />
                                                   <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                                               </g>
                                           </svg>
                                           Italiano
                                       </div>
                                   </a>
                               </li>
                               <li>
                                   <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                       <div class="inline-flex items-center">
                                           <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true"
                                               xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icon-css-cn"
                                               viewBox="0 0 512 512">
                                               <defs>
                                                   <path id="a" fill="#ffde00"
                                                       d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                               </defs>
                                               <path fill="#de2910" d="M0 0h512v512H0z" />
                                               <use width="30" height="20"
                                                   transform="matrix(76.8 0 0 76.8 128 128)" xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-121 142.6 -47) scale(25.5827)"
                                                   xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-98.1 198 -82) scale(25.6)" xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="rotate(-74 272.4 -114) scale(25.6137)"
                                                   xlink:href="#a" />
                                               <use width="30" height="20"
                                                   transform="matrix(16 -19.968 19.968 16 256 230.4)"
                                                   xlink:href="#a" />
                                           </svg>
                                           中文 (繁體)
                                       </div>
                                   </a>
                               </li>
                           </ul>

                       </div>

                       <!-- END LENGUAGE BUTTON -->
                   </div>
                   <p class="my-4 text-xs text-center text-gray-400">
                       <span>Copyright © {{ date('Y') }} - Aios Real Estate</span>
                   </p>
               </div>
           </nav>
       </div>
       <!-- nav - end -->

   </header>
