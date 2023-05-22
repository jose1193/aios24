<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('Nosotros') }}
                    </x-nav-link>
                    @can('manage admin')
                        <x-nav-link id="dropdownDefaultButton" data-dropdown-toggle="dropdown2" class="cursor-pointer"
                            type="button">Locality
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </x-nav-link>
                        <!-- Dropdown menu -->
                        <div id="dropdown2"
                            class=" z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('countries') }}" :active="request() - > routeIs('countries')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Countries') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('provinces') }}" :active="request() - > routeIs('provinces')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Provinces') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('communities') }}" :active="request() - > routeIs('communities')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Island') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('cities') }}" :active="request() - > routeIs('cities')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Cities') }}</a>
                                </li>


                            </ul>
                        </div>
                        <x-nav-link id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="cursor-pointer"
                            type="button">Management
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </x-nav-link>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class=" z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('buckets') }}" :active="request() - > routeIs('buckets')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Buckets') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('plans') }}" :active="request() - > routeIs('plans')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Planes') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('transactions') }}" :active="request() - > routeIs('transactions')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Transactions') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('properties') }}" :active="request() - > routeIs('properties')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Propiedades') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('emailadmin') }}" :active="request() - > routeIs('emailadmin')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Admin Email ') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('contactforms') }}" :active="request() - > routeIs('contactforms')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('User Contact') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('posts') }}" :active="request() - > routeIs('posts')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Posts Manage') }}</a>
                                </li>
                            </ul>
                        </div>

                        <x-nav-link id="dropdownDefaultButton" data-dropdown-toggle="dropdown3" class="cursor-pointer"
                            type="button">Anuncios
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </x-nav-link>
                        <!-- Dropdown menu -->
                        <div id="dropdown3"
                            class=" z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('estatus') }}" :active="request() - > routeIs('estatus')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ __('Estatus Anuncios') }}</a>
                                </li>



                            </ul>
                        </div>

                        <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                            {{ __('Usuarios') }}
                        </x-nav-link>
                    @endcan
                    <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contacto') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">

                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('Nosotros') }}
            </x-responsive-nav-link>

            @can('manage admin')
                <!-- Dropdown Menu 1-->
                <div class="relative" x-data="{ open: false }">
                    <x-responsive-nav-link href="#" class="dropdown-toggle" @click="open = !open">
                        {{ __('Locality') }}
                        <span class="fa fa-chevron-down ml-1"></span>
                    </x-responsive-nav-link>

                    <div x-show="open" @click.away="open = false"
                        class="absolute z-[9999] right-0 mt-2 w-full bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg dropdown-menu">
                        <div class="py-1">
                            <x-responsive-nav-link href="{{ route('countries') }}" :active="request()->routeIs('countries')">
                                {{ __('Countries') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="{{ route('provinces') }}" :active="request()->routeIs('provinces')">
                                {{ __('Provinces') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('communities') }}" :active="request()->routeIs('transactions')">
                                {{ __('Island') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('cities') }}" :active="request()->routeIs('cities')">
                                {{ __('Cities') }}
                            </x-responsive-nav-link>

                        </div>
                    </div>
                </div>

                <!-- End Dropdown Menu 1-->

                <!-- Dropdown Menu 2-->
                <div class="relative" x-data="{ open: false }">
                    <x-responsive-nav-link href="#" class="dropdown-toggle" @click="open = !open">
                        {{ __('Management') }}
                        <span class="fa fa-chevron-down ml-1"></span>
                    </x-responsive-nav-link>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-full bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg dropdown-menu">
                        <div class="py-1">
                            <x-responsive-nav-link href="{{ route('buckets') }}" :active="request()->routeIs('buckets')">
                                {{ __('Buckets') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="{{ route('plans') }}" :active="request()->routeIs('plans')">
                                {{ __('Planes') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('transactions') }}" :active="request()->routeIs('transactions')">
                                {{ __('Transactions') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('properties') }}" :active="request()->routeIs('properties')">
                                {{ __('Propiedades') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('emailadmin') }}" :active="request()->routeIs('emailadmin')">
                                {{ __('Admin Email') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="{{ route('contactforms') }}" :active="request()->routeIs('contactforms')">
                                {{ __('User Contact ') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                                {{ __('Posts Manage ') }}
                            </x-responsive-nav-link>
                        </div>
                    </div>
                </div>
                <!-- End Dropdown Menu 2-->
                <!-- Dropdown Menu 3-->
                <div class="relative" x-data="{ open: false }">
                    <x-responsive-nav-link href="#" class="dropdown-toggle" @click="open = !open">
                        {{ __('Anuncios') }}
                        <span class="fa fa-chevron-down ml-1"></span>
                    </x-responsive-nav-link>

                    <div x-show="open" @click.away="open = false"
                        class="absolute z-[9999] right-0 mt-2 w-full bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg dropdown-menu">
                        <div class="py-1">
                            <x-responsive-nav-link href="{{ route('estatus') }}" :active="request()->routeIs('estatus')">
                                {{ __('Estatus Anuncios') }}
                            </x-responsive-nav-link>



                        </div>
                    </div>
                </div>

                <!-- End Dropdown Menu 3-->
                <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('users')">
                {{ __('Contacto') }}
            </x-responsive-nav-link>
        </div>

        <!-- Resto del código -->
    </div>

</nav>
