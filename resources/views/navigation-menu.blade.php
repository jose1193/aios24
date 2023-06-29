<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ asset('img/logo.jpg') }}" class="h-16 mr-3" alt="Aios Logo" />

        </a>
        <div class="flex items-center md:order-2">
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
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 rounded md:bg-transparent font-semibold text-green-600 transition duration-500 ease-in-out hover:text-green-500 md:p-0 "
                        :active="request() - > routeIs('dashboard')" aria-current="page"> {{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" :active="request() - > routeIs('about')"
                        class="block py-2 pl-3 pr-4 rounded md:bg-transparent font-semibold text-green-600 transition duration-500 ease-in-out hover:text-green-500 md:p-0 ">{{ __('Nosotros') }}</a>
                </li>
                @can('manage admin')
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-semibold text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Management
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('buckets') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Buckets') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('plans') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Planes') }}</a>
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
                    <li>
                        <a href="{{ route('users') }}" :active="request() - > routeIs('users')"
                            class="block py-2 pl-3 pr-4 rounded md:bg-transparent font-semibold text-green-600 transition duration-500 ease-in-out hover:text-green-500 md:p-0 ">{{ __('Usuarios') }}</a>
                    </li>
                @endcan
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-semibold text-green-600 rounded transition duration-500 ease-in-out hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 md:w-auto ">Anuncios
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar2"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
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
                                <a href="{{ route('show-favorites') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ __('Mis Favoritos') }}</a>
                            </li>


                        </ul>

                    </div>
                </li>

                <li>
                    <a href="{{ route('contact') }}" :active="request() - > routeIs('contact')"
                        class="block py-2 pl-3 pr-4 rounded md:bg-transparent font-semibold text-green-600 transition duration-500 ease-in-out hover:text-green-700 md:p-0 ">{{ __('Contacto') }}</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}" :active="request() - > routeIs('blog')"
                        class="block py-2 pl-3 pr-4 rounded md:bg-transparent font-semibold text-green-600 transition duration-500 ease-in-out hover:text-green-700 md:p-0 ">{{ __('Blog') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
