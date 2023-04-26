<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AIOS Real Estate </title>

    <!-- Fonts -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

    </style>

</head>

<body class="antialiased">
    <!-- HERO -->

    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">



            <header class="">


                <!-- nav - start -->
                <nav class="relative px-7 py-7 flex justify-between items-center bg-white">
                    <a class="text-3xl font-bold leading-none" href="#">
                        <img src="{{ asset('img/logo.jpg') }}" class="h-16 -ml-3" alt="logo">
                    </a>
                    <div class="lg:hidden">
                        <button class="navbar-burger flex items-center text-green-600 p-3">
                            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Mobile menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                            </svg>
                        </button>
                    </div>
                    <ul
                        class="hidden absolute  top-1/2 left-1/3 transform -translate-y-1/2 -translate-x-1/2  lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-5">
                        <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Home</a></li>
                        </li>
                        <li class="text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </li>
                        <li><a class="text-md   text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Nosotros</a></li>
                        <li class="text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </li>
                        <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Servicios</a></li>
                        <li class="text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </li>
                        <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Precios</a></li>
                        <li class="text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </li>
                        <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Contacto</a></li>

                        <li class="text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </li>
                        <li><a class="text-md text-green-600 
                            transition duration-500 ease-in-out hover:text-green-700 font-bold"
                                href="#">Blog</a></li>

                    </ul>
                    <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 transition duration-500 ease-in-out bg-gray-50
                     hover:bg-green-200 text-sm text-gray-900 font-bold  rounded-xl "
                        href="#">Ingresar</a>
                    <a class="hidden lg:inline-block py-2 px-6 bg-green-600 transition duration-500 ease-in-out hover:bg-green-500 text-sm text-white font-bold rounded-xl "
                        href="#">Publicar</a>
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
                                                        transform="rotate(-98.1 198 -82) scale(25.6)"
                                                        xlink:href="#a" />
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
                </nav>
                <div class="navbar-menu relative z-50 hidden">
                    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
                    <nav
                        class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                        <div class="flex items-center mb-8">
                            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                                <img src="img/logo.jpg" class="h-12" alt="logo">

                            </a>
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
                                    <a class="block p-4 text-sm font-semibold text-green-600
                                     hover:bg-green-100 transition duration-500 ease-in-out hover:text-green-700  rounded"
                                        href="#">Home</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700  rounded"
                                        href="#">Nosotros</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                                        href="#">Servicios</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                   transition duration-500 ease-in-out  hover:text-green-700 rounded"
                                        href="#">Precios</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                                        href="#">Contacto</a>
                                </li>
                                <li class="mb-1">
                                    <a class="block p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded"
                                        href="#">Blog</a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                        <div class="mt-auto">
                            <div class="pt-6">
                                <a class="block px-4 py-3 mb-3  text-xs text-center font-semibold leading-none bg-gray-50
                                transition duration-500 ease-in-out  hover:bg-green-100 rounded-xl"
                                    href="#">Ingresar</a>
                                <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center
                                 text-white font-semibold bg-green-600 transition duration-500 ease-in-out hover:bg-green-700  rounded-xl"
                                    href="#">Publicar</a>
                                <!-- START LENGUAGE BUTTON -->
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4
                                         p-4 text-sm font-semibold text-green-600 hover:bg-green-100
                                    transition duration-500 ease-in-out hover:text-green-700 rounded">
                                    <img class="w-4 h-4 mr-2 rounded-full"
                                        src="https://img.icons8.com/color/48/null/spain2-circular.png" />
                                    Español
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        id="flag-icon-css-cn" viewBox="0 0 512 512">
                                                        <defs>
                                                            <path id="a" fill="#ffde00"
                                                                d="M1-.3L-.7.8 0-1 .6.8-1-.3z" />
                                                        </defs>
                                                        <path fill="#de2910" d="M0 0h512v512H0z" />
                                                        <use width="30" height="20"
                                                            transform="matrix(76.8 0 0 76.8 128 128)"
                                                            xlink:href="#a" />
                                                        <use width="30" height="20"
                                                            transform="rotate(-121 142.6 -47) scale(25.5827)"
                                                            xlink:href="#a" />
                                                        <use width="30" height="20"
                                                            transform="rotate(-98.1 198 -82) scale(25.6)"
                                                            xlink:href="#a" />
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

            <section
                class="image-wrap z-1 min-h-50 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
                <!-- image - start -->
                <img src="{{ asset('img/01.jpg') }}" loading="lazy" alt="Hero Img"
                    class="absolute inset-0 h-full w-full object-cover object-center" />
                <!-- image - end -->

                <!-- overlay - start -->
                <div class="absolute inset-0 bg-black opacity-80"></div>
                <!-- overlay - end -->

                <!-- text start -->
                <div class=" relative flex flex-col items-center p-4 sm:max-w-xl">

                    <h1 class="mb-8 -mt-15 text-center text-3xl font-bold text-white sm:text-5xl md:mb-12 md:text-4xl">
                        Te ayudaremos a encontrar tu <span class="text-green-600">propiedad</span> ideal
                    </h1>


                </div>
                <!-- text end -->

            </section>
        </div>
        <div class="container relative -mt-20 z-1 mx-auto flex justify-center items-center ">
            <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-5">
                    <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">

                        <select
                            class="bg-gray-50 border pl-2 border-green-200 text-gray-900 text-md  rounded-lg  block w-full p-2.5 ">
                            <option value="">Transacción</option>
                            <option value="Alquiler">Alquilar</option>
                            <option value="Venta">Comprar</option>
                            <option value="Compartir">Compartir</option>

                        </select>

                        <select
                            class="bg-gray-50 border border-green-200 text-gray-900 text-md  rounded-lg  block w-full p-2.5 ">
                            <option value="">Tipo</option>
                            <option value="Casas">Casas</option>
                            <option value="Pisos">Pisos</option>
                            <option value="Habitación">Habitación</option>
                            <option value="Terreno">Terreno</option>
                            <option value="Garajes">Garajes</option>
                            <option value="Oficinas">Oficinas</option>
                            <option value="Locales">Locales</option>
                            <option value="Terrenos">Terrenos</option>
                            <option value="Bodega/Galpón">Bodega / Galpón</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Todos">Todos</option>

                        </select>

                    </div>
                    <div class="grid grid-cols-1 gap-1 border border-gray-200 p-2 rounded">


                        <!-- component -->
                        <div class='w-full mx-auto'>
                            <div
                                class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                                <div class="grid place-items-center h-full w-12 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>

                                <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                                    type="text" id="search"
                                    placeholder="Ingresa ubicaciones o Características..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-button2 type="submit">
                        <i class="fa-solid fa-city mr-1"></i> Buscar
                    </x-button2>

                </div>
            </div>
        </div>

    </div>


    <!-- END HERO -->

    <!-- FEATURED 1 -->
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-5">
        <!--Card 1-->
        <div class=" w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                style="background-image: url('{{ asset('img/mobile-ads.jpg') }}')" title="mobile ads">
            </div>
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="text-gray-900 font-bold text-xl mb-2">Anunciate gratis</div>
                    <p class="text-gray-700 text-base">Anuncia tu propiedad de manera gratuita sin preocupaciones,
                        beneficiándote de los mejores resultados. Obtén el máximo provecho sin costo alguno, alcanzando
                        tus objetivos con facilidad.</p>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-green-600 font-bold leading-none text-lg">Quiero anunciar
                        gratis</a>
                </div>
            </div>
        </div>
        <!--Card 2-->
        <div class="w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                style="background-image: url('{{ asset('img/city.jpg') }}')" title="city">
            </div>
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="text-gray-900 font-bold text-xl mb-2">Búsqueda por Zona</div>
                    <p class="text-gray-700 text-base">Explora nuestras propiedades ubicadas en diversas ubicaciones
                        para encontrar la que mejor se adapte a tus necesidades y presupuesto.
                        Nuestro sitio te permite filtrar por zona y otros criterios para
                        encontrar la propiedad perfecta en el mapa.</p>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-green-600 font-bold leading-none text-lg">Mi Zona de Búsqueda</a>
                </div>
            </div>
        </div>
        <!--Card 3-->

    </div>
    <!-- END FEATURED 1 -->

    <!-- NEW ADS -->
    <h2 class="w-full my-10 text-4xl font-bold leading-tight text-center text-gray-800">
        Últimos Anuncios
    </h2>
    <div class="w-full mb-4 -mt-5">
        <div class="h-1 mx-auto bg-green-600 w-64 opacity-25 my-0 py-0 rounded-t"></div>
    </div>
    <div class="p-10 grid w-full grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">


        <div class="relative mx-auto w-full">
            <a href="#"
                class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="rounded-lg bg-white p-4 shadow">
                    <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                        <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-80">
                                <img src="https://assets.entrepreneur.com/content/3x2/2000/20150622231001-for-sale-real-estate-home-house.jpeg?crop=16:9"
                                    alt="" />
                            </div>
                        </div>

                        <div class="absolute bottom-0 left-5 mb-3 flex">
                            <p class="flex items-center font-medium text-white shadow-sm">
                                <i class="fa fa-camera mr-2 text-xl text-white"></i>
                                10
                            </p>
                        </div>
                        <div class="absolute bottom-0 right-5 mb-3 flex">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-heart mr-2 text-2xl text-white"></i>
                            </p>
                        </div>

                        <span
                            class="absolute top-0 right-2 z-10 mt-3 ml-3 inline-flex select-none rounded-sm bg-[#27c54f] px-2 py-1 text-xs font-semibold text-white">
                            En Venta </span>

                    </div>

                    <div class="mt-4">
                        <h2 class="line-clamp-1 text-2xl font-medium text-gray-800 md:text-lg" title="New York">10765
                            Hillshire Ave, Baton Rouge, LAS PALMAS, SPAIN</h2>




                    </div>
                    <div class="mt-4 mb-5">
                        <p class="line-clamp-1 mt-2 text-lg text-gray-800">2 bedrooms designed Imported
                            fixtures and fittings Full basement Top of the [more]</p>
                    </div>


                    <div class="justify-center py-4 border-y border-slate-100 ">
                        <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bed mr-2  text-green-600"></i>
                                2 Beds
                            </p>

                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bath mr-2 text-green-600"></i>
                                3 Baths
                            </p>
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-home mr-2  text-green-600"></i>
                                100 m²
                            </p>
                        </div>
                    </div>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">€7000</p>
                        </li>

                        <li>

                            <ul class="text-lg font-medium  list-none">
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>

                                <li class="inline">
                                    <button><i
                                            class="fa fa-sms mx-1 rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                                <li class="inline">
                                    <button><i
                                            class="fa fa-phone rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </a>
        </div>
        <div class="relative mx-auto w-full">
            <a href="#"
                class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="rounded-lg bg-white p-4 shadow">
                    <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                        <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-80">
                                <img src="https://assets.entrepreneur.com/content/3x2/2000/20150622231001-for-sale-real-estate-home-house.jpeg?crop=16:9"
                                    alt="" />
                            </div>
                        </div>

                        <div class="absolute bottom-0 left-5 mb-3 flex">
                            <p class="flex items-center font-medium text-white shadow-sm">
                                <i class="fa fa-camera mr-2 text-xl text-white"></i>
                                10
                            </p>
                        </div>
                        <div class="absolute bottom-0 right-5 mb-3 flex">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-heart mr-2 text-2xl text-white"></i>
                            </p>
                        </div>

                        <span
                            class="absolute top-0 right-2 z-10 mt-3 ml-3 inline-flex select-none rounded-sm bg-[#27c54f] px-2 py-1 text-xs font-semibold text-white">
                            Alquiler </span>

                    </div>

                    <div class="mt-4">
                        <h2 class="line-clamp-1 text-2xl font-medium text-gray-800 md:text-lg" title="New York">10765
                            Hillshire Ave, Baton Rouge, LAS PALMAS, SPAIN</h2>




                    </div>
                    <div class="mt-4 mb-5">
                        <p class="line-clamp-1 mt-2 text-lg text-gray-800">2 bedrooms designed Imported
                            fixtures and fittings Full basement Top of the [more]</p>
                    </div>


                    <div class="justify-center py-4 border-y border-slate-100 ">
                        <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bed mr-2  text-green-600"></i>
                                2 Beds
                            </p>

                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bath mr-2 text-green-600"></i>
                                3 Baths
                            </p>
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-home mr-2  text-green-600"></i>
                                100 m²
                            </p>
                        </div>
                    </div>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">€5000</p>
                        </li>

                        <li>

                            <ul class="text-lg font-medium  list-none">
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>

                                <li class="inline">
                                    <button><i
                                            class="fa fa-sms mx-1 rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                                <li class="inline">
                                    <button><i
                                            class="fa fa-phone rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </a>
        </div>

        <div class="relative mx-auto w-full">
            <a href="#"
                class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="rounded-lg bg-white p-4 shadow">
                    <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                        <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-80">
                                <img src="https://assets.entrepreneur.com/content/3x2/2000/20150622231001-for-sale-real-estate-home-house.jpeg?crop=16:9"
                                    alt="" />
                            </div>
                        </div>

                        <div class="absolute bottom-0 left-5 mb-3 flex">
                            <p class="flex items-center font-medium text-white shadow-sm">
                                <i class="fa fa-camera mr-2 text-xl text-white"></i>
                                10
                            </p>
                        </div>
                        <div class="absolute bottom-0 right-5 mb-3 flex">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-heart mr-2 text-2xl text-white"></i>
                            </p>
                        </div>

                        <span
                            class="absolute top-0 right-2 z-10 mt-3 ml-3 inline-flex select-none rounded-sm bg-[#27c54f] px-2 py-1 text-xs font-semibold text-white">
                            En Venta </span>

                    </div>

                    <div class="mt-4">
                        <h2 class="line-clamp-1 text-2xl font-medium text-gray-800 md:text-lg" title="New York">10765
                            Hillshire Ave, Baton Rouge, LAS PALMAS, SPAIN</h2>




                    </div>
                    <div class="mt-4 mb-5">
                        <p class="line-clamp-1 mt-2 text-lg text-gray-800">2 bedrooms designed Imported
                            fixtures and fittings Full basement Top of the [more]</p>
                    </div>


                    <div class="justify-center py-4 border-y border-slate-100 ">
                        <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bed mr-2  text-green-600"></i>
                                2 Beds
                            </p>

                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bath mr-2 text-green-600"></i>
                                3 Baths
                            </p>
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-home mr-2  text-green-600"></i>
                                100 m²
                            </p>
                        </div>
                    </div>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">€5000</p>
                        </li>

                        <li>

                            <ul class="text-lg font-medium  list-none">
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>

                                <li class="inline">
                                    <button><i
                                            class="fa fa-sms mx-1 rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                                <li class="inline">
                                    <button><i
                                            class="fa fa-phone rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </a>
        </div>

        <div class="relative mx-auto w-full">
            <a href="#"
                class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                <div class="rounded-lg bg-white p-4 shadow">
                    <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                        <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                            <div class="absolute inset-0 bg-black bg-opacity-80">
                                <img src="https://assets.entrepreneur.com/content/3x2/2000/20150622231001-for-sale-real-estate-home-house.jpeg?crop=16:9"
                                    alt="" />
                            </div>
                        </div>

                        <div class="absolute bottom-0 left-5 mb-3 flex">
                            <p class="flex items-center font-medium text-white shadow-sm">
                                <i class="fa fa-camera mr-2 text-xl text-white"></i>
                                10
                            </p>
                        </div>
                        <div class="absolute bottom-0 right-5 mb-3 flex">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-heart mr-2 text-2xl text-white"></i>
                            </p>
                        </div>

                        <span
                            class="absolute top-0 right-2 z-10 mt-3 ml-3 inline-flex select-none rounded-sm bg-[#27c54f] px-2 py-1 text-xs font-semibold text-white">
                            En Venta </span>

                    </div>

                    <div class="mt-4">
                        <h2 class="line-clamp-1 text-2xl font-medium text-gray-800 md:text-lg" title="New York">10765
                            Hillshire Ave, Baton Rouge, LAS PALMAS, SPAIN</h2>




                    </div>
                    <div class="mt-4 mb-5">
                        <p class="line-clamp-1 mt-2 text-lg text-gray-800">2 bedrooms designed Imported
                            fixtures and fittings Full basement Top of the [more]</p>
                    </div>


                    <div class="justify-center py-4 border-y border-slate-100 ">
                        <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bed mr-2  text-green-600"></i>
                                2 Beds
                            </p>

                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-bath mr-2 text-green-600"></i>
                                3 Baths
                            </p>
                            <p class="flex items-center font-medium text-gray-800">
                                <i class="fa fa-home mr-2  text-green-600"></i>
                                100 m²
                            </p>
                        </div>
                    </div>

                    <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                        <li>
                            <span class="text-slate-400">Price</span>
                            <p class="text-lg font-medium">€5000</p>
                        </li>

                        <li>

                            <ul class="text-lg font-medium  list-none">
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>
                                <li class="inline">
                                    <i class="mdi mdi-star"></i>
                                </li>

                                <li class="inline">
                                    <button><i
                                            class="fa fa-sms mx-1 rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                                <li class="inline">
                                    <button><i
                                            class="fa fa-phone rounded-md bg-green-600 py-1 px-3 text-2xl text-white"></i></button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </a>
        </div>
    </div>
    <!-- END NEW ADS -->
    <!-- CONTENT DESCRIPTION 1 -->
    <div class="container my-24 px-6 mx-auto">

        <!-- Section: Design Block -->
        <section class="mb-32">
            <style>
                @media (min-width: 992px) {
                    #cta-img-nml-50 {
                        margin-left: 50px;
                    }
                }
            </style>

            <div class="flex flex-wrap">
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
                    <div class="flex lg:py-12">
                        <img src="{{ asset('img/vacation.jpg') }}" class="w-full rounded-lg shadow-lg"
                            id="cta-img-nml-50" style="z-index: 10" alt="" />
                    </div>
                </div>

                <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                    <div
                        class="bg-green-500 h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
                        <div class="lg:pl-12">
                            <h2 class="text-3xl font-bold mb-6">Buscando una propiedad ?</h2>
                            <p class="mb-6 pb-2 lg:pb-0">
                                ¡Es el momento de aprovechar todas las oportunidades que nuestro sitio web de
                                clasificados te ofrece! Explora inmuebles nuevos, descubre lo mejor de las diferentes
                                culturas al alquilar o comprar una propiedad de la zona y vive experiencias que te
                                dejarán marcado
                                para siempre.
                            </p>



                            <p>
                                ¡Aprovecha todas las oportunidades que nuestro sitio web de clasificados te ofrece!
                                Explora inmuebles nuevos, descubre lo mejor de las diferentes culturas al alquilar o
                                comprar una
                                propiedad de la zona y disfruta de la comodidad y seguridad de tener un lugar para
                                vivir. ¡Explora una amplia variedad de propiedades que te proporciona
                                nuestro sitio web!
                            </p>


                            <div
                                class=" mt-7 flex flex-col md:flex-row md:justify-around xl:justify-start mb-6 mx-auto">

                                <x-a-button2 href="#" class="">
                                    <i class="fa-solid fa-magnifying-glass mr-2"></i>
                                    Ver alquileres disponibles
                                </x-a-button2>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->

    </div>
    <!-- END CONTENT DESCRIPTION 1 -->

    <!-- MOBILE APP- start -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">


                <!-- content - start -->
                <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
                    <h2 class="mb-4 text-xl font-bold text-green-800 md:text-2xl lg:text-4xl">Descarga la aplicación
                        para Dispositivos Móviles </h2>

                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="text-center text-green-600 lg:w-1/2 px-2">
                            <p>Descubra una navegación intuitiva y una interfaz de usuario mejorada que le permitirá
                                navegar por nuestro sitio web en cualquier lugar. ¡Experimenta la comodidad de nuestro
                                sitio web para Móviles ahora!</p>
                        </div>
                        <div class="lg:w-52 px-2 -mt-5">
                            <img src="{{ asset('img/qr-image.png') }}" alt="QR Code for mobile download">
                        </div>
                    </div>


                </div>
                <!-- content - end -->

                <!-- image - start -->
                <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
                    <img src="{{ asset('img/mobile.jpg') }}" loading="lazy" alt="Photo by Andras Vas"
                        class="h-full w-full object-cover object-center" />
                </div>
                <!-- image - end -->
            </div>
        </div>
    </div>
    <!-- MOBILE APP - end -->


    <!-- FEATURED 2 -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Estamos contigo a
                    cada
                    paso</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Le ofrecemos una variedad de
                    opciones para alquilar y comprar propiedades.</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-4 sm:grid-cols-2 md:gap-8 xl:grid-cols-3">
                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM288 176c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 48.8 46.5 111.6 68.6 138.6c6 7.3 16.8 7.3 22.7 0c22.1-27 68.6-89.8 68.6-138.6zm-112 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>

                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Búsqueda clara y rápida</h3>
                        <p class="text-gray-500">Nuestros filtros de búsqueda de anuncios están diseñados para hacer tu
                            experiencia más sencilla.</p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">


                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 640 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M272.2 64.6l-51.1 51.1c-15.3 4.2-29.5 11.9-41.5 22.5L153 161.9C142.8 171 129.5 176 115.8 176H96V304c20.4 .6 39.8 8.9 54.3 23.4l35.6 35.6 7 7 0 0L219.9 397c6.2 6.2 16.4 6.2 22.6 0c1.7-1.7 3-3.7 3.7-5.8c2.8-7.7 9.3-13.5 17.3-15.3s16.4 .6 22.2 6.5L296.5 393c11.6 11.6 30.4 11.6 41.9 0c5.4-5.4 8.3-12.3 8.6-19.4c.4-8.8 5.6-16.6 13.6-20.4s17.3-3 24.4 2.1c9.4 6.7 22.5 5.8 30.9-2.6c9.4-9.4 9.4-24.6 0-33.9L340.1 243l-35.8 33c-27.3 25.2-69.2 25.6-97 .9c-31.7-28.2-32.4-77.4-1.6-106.5l70.1-66.2C303.2 78.4 339.4 64 377.1 64c36.1 0 71 13.3 97.9 37.2L505.1 128H544h40 40c8.8 0 16 7.2 16 16V352c0 17.7-14.3 32-32 32H576c-11.8 0-22.2-6.4-27.7-16H463.4c-3.4 6.7-7.9 13.1-13.5 18.7c-17.1 17.1-40.8 23.8-63 20.1c-3.6 7.3-8.5 14.1-14.6 20.2c-27.3 27.3-70 30-100.4 8.1c-25.1 20.8-62.5 19.5-86-4.1L159 404l-7-7-35.6-35.6c-5.5-5.5-12.7-8.7-20.4-9.3C96 369.7 81.6 384 64 384H32c-17.7 0-32-14.3-32-32V144c0-8.8 7.2-16 16-16H56 96h19.8c2 0 3.9-.7 5.3-2l26.5-23.6C175.5 77.7 211.4 64 248.7 64H259c4.4 0 8.9 .2 13.2 .6zM544 320V176H496c-5.9 0-11.6-2.2-15.9-6.1l-36.9-32.8c-18.2-16.2-41.7-25.1-66.1-25.1c-25.4 0-49.8 9.7-68.3 27.1l-70.1 66.2c-10.3 9.8-10.1 26.3 .5 35.7c9.3 8.3 23.4 8.1 32.5-.3l71.9-66.4c9.7-9 24.9-8.4 33.9 1.4s8.4 24.9-1.4 33.9l-.8 .8 74.4 74.4c10 10 16.5 22.3 19.4 35.1H544zM64 336a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm528 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Una gran variedad de anunciantes</h3>
                        <p class="text-gray-500">Las mejores opciones de propiedades están disponibles en inmobiliarias
                            y dueños directos de propiedades.
                        </p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 384 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Elección de Categorias</h3>
                        <p class="text-gray-500">Desde tu cuenta, podrás acceder de forma segura a los anuncios
                            seleccionados, tus favoritos, los anuncios que has publicado y más.</p>
                    </div>
                </div>
                <!-- feature - end -->





            </div>
        </div>
    </div>



    <!-- END FEATURED 2 -->
    <!-- LATEST POST -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-green-600 md:mb-6 lg:text-3xl">Blog</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">En nuestro blog recientemente
                    hemos publicado una variedad de artículos interesantes que tratan sobre propiedades, noticias y
                    mucho más. Invitamos a todos a explorar nuestro blog y leer los últimos artículos.</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16">
                <!-- article - start -->
                <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                    <a href="#"
                        class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                        <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600"
                            loading="lazy" alt="Photo by Minh Pham"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-400">January 19, 2023</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="#" class="duration-500 ease-in-out hover:text-green-500 ">New trends
                                in Tech</a>
                        </h2>

                        <p class="text-gray-500">This is a section of some simple filler text, also known as
                            placeholder text.</p>

                        <div>
                            <a href="#"
                                class="font-semibold text-green-500 duration-500 ease-in-out hover:text-green-600">Leer
                                más</a>
                        </div>
                    </div>
                </div>
                <!-- article - end -->

                <!-- article - start -->
                <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                    <a href="#"
                        class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                        <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600"
                            loading="lazy" alt="Photo by Lorenzo Herrera"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-400">April 07, 2023</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="#" class="duration-500 ease-in-out hover:text-green-500 ">Working
                                with legacy stacks</a>
                        </h2>

                        <p class="text-gray-500">This is a section of some simple filler text, also known as
                            placeholder text.</p>

                        <div>
                            <a href="#"
                                class="font-semibold text-green-500 duration-500 ease-in-out
                                 hover:text-green-600 ">Leer
                                más</a>
                        </div>
                    </div>
                </div>
                <!-- article - end -->

                <!-- article - start -->
                <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                    <a href="#"
                        class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                        <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=600"
                            loading="lazy" alt="Photo by Magicle"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-400">April 15, 2023</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="#" class="duration-500 ease-in-out hover:text-green-500 ">10 best
                                smartphones for devs</a>
                        </h2>

                        <p class="text-gray-500">This is a section of some simple filler text, also known as
                            placeholder text.</p>

                        <div>
                            <a href="#"
                                class="font-semibold text-green-500 duration-500 ease-in-out hover:text-green-600 ">Leer
                                más</a>
                        </div>
                    </div>
                </div>
                <!-- article - end -->

                <!-- article - start -->
                <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                    <a href="#"
                        class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                        <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=600"
                            loading="lazy" alt="Photo by Martin Sanchez"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-400">April 27, 2023</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="#" class="duration-500 ease-in-out hover:text-green-500 ">8 High
                                performance Notebooks</a>
                        </h2>

                        <p class="text-gray-500">This is a section of some simple filler text, also known as
                            placeholder text.</p>

                        <div>
                            <a href="#"
                                class="font-semibold text-green-500 duration-500 ease-in-out hover:text-green-600 ">Leer
                                más</a>
                        </div>
                    </div>
                </div>
                <!-- article - end -->
            </div>
        </div>
    </div>
    <!-- END LATEST POST -->


    <!-- SUPPORT CONTACT - start -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">
                <!-- image - start -->
                <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
                    <img src="{{ asset('img/help-center.jpg') }}" loading="lazy" alt="Photo by Andras Vas"
                        class="h-full w-full object-cover object-center" />
                </div>
                <!-- image - end -->

                <!-- content - start -->
                <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
                    <h2 class="mb-4 text-xl font-bold text-green-800 md:text-2xl lg:text-4xl">Centro de Ayuda</h2>

                    <p class="mb-8 max-w-md text-green-600">Si desea ponerse en contacto con nosotros, puede hacerlo a
                        través del formulario de contacto de nuestro sitio web. Estamos disponibles para responder
                        cualquier pregunta o inquietud que tenga.</p>

                    <div class="mt-auto">
                        <x-a-button href="#" class="">
                            <i class="fa-solid fa-chalkboard-user mr-2"></i>
                            Contacto
                        </x-a-button>

                    </div>
                </div>
                <!-- content - end -->
            </div>
        </div>
    </div>
    <!-- SUPPORT CONTACT - end -->

    <!-- NESLETTER - start -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 sm:p-8">
                <div class="mb-4 sm:mb-8">
                    <h2 class="text-center text-xl font-bold text-green-500 sm:text-2xl lg:text-3xl">Obtenga lo último
                        de nuestras actualizaciones</h2>
                    <p class="text-center text-green-500">Suscríbete a nuestra newsletter</p>
                </div>

                <form class="mb-3 flex w-full max-w-md gap-2 sm:mb-5">
                    <input placeholder="Email"
                        class="bg-gray-white w-full flex-1 rounded border border-gray-300 px-3 py-2 text-gray-800 placeholder-gray-400 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-button2 type="submit">
                        Enviar
                    </x-button2>

                </form>

                <p class="text-center text-xs text-gray-400">Al suscribirse a nuestro boletín de noticias, usted acepta
                    nuestro <a href="#" class="underline transition duration-100 hover:text-green-500 ">Términos
                        de Servicios</a> y <a href="#"
                        class="underline transition duration-100 hover:text-green-500 ">Política de Privacidad
                    </a>.</p>
            </div>
        </div>
    </div>
    <!-- newsletter - end -->
    <!-- FOOTER -->

    <div class="bg-gray-900">
        <footer class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="mb-16 grid grid-cols-2 gap-12 pt-10 md:grid-cols-4 lg:grid-cols-6 lg:gap-8 lg:pt-12">
                <div class="col-span-full lg:col-span-2">
                    <!-- logo - start -->
                    <div class="mb-4 lg:-mt-2">
                        <a href="/"
                            class="inline-flex items-center gap-2 text-xl font-bold text-gray-100 md:text-2xl"
                            aria-label="logo">
                            <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-5 text-green-500"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                            </svg>

                            Aios Real Estate
                        </a>
                    </div>
                    <!-- logo - end -->

                    <p class="mb-6 text-gray-400 sm:pr-8">Aios Real Estate ofrece alquileres y ventas de propiedades de
                        alto
                        nivel. Nuestra experiencia en el sector inmobiliario garantiza que todos nuestros clientes
                        obtendrán la mejor calidad en la búsqueda de la propiedad perfecta para satisfacer sus
                        necesidades.</p>

                    <!-- social - start -->
                    <div class="flex gap-4">
                        <a href="#" target="_blank"
                            class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                            <svg class="h-5 w-5" width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 512 512">
                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                            </svg>
                        </a>
                        <a href="#" target="_blank"
                            class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                            <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>

                        <a href="#" target="_blank"
                            class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                            <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>

                        <a href="#" target="_blank"
                            class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                            <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>


                    </div>
                    <!-- social - end -->
                </div>

                <!-- nav - start -->
                <div>
                    <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Productos</div>

                    <nav class="flex flex-col gap-4">
                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Overview</a>
                        </div>

                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Soluciones</a>
                        </div>

                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Precios</a>
                        </div>


                    </nav>
                </div>
                <!-- nav - end -->

                <!-- nav - start -->
                <div>
                    <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Compañía</div>

                    <nav class="flex flex-col gap-4">
                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Acerca
                                de</a>
                        </div>



                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Publicidad</a>
                        </div>



                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Blog</a>
                        </div>
                    </nav>
                </div>
                <!-- nav - end -->

                <!-- nav - start -->
                <div>
                    <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Soporte</div>

                    <nav class="flex flex-col gap-4">
                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Contacto</a>
                        </div>


                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">FAQ</a>
                        </div>
                    </nav>
                </div>
                <!-- nav - end -->

                <!-- nav - start -->
                <div>
                    <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Legal</div>

                    <nav class="flex flex-col gap-4">
                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Términos
                                de Servicios</a>
                        </div>

                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out hover:text-white active:text-white">Política
                                de Privacidad</a>
                        </div>

                        <div>
                            <a href="#"
                                class="text-gray-400 duration-500 ease-in-out
                                 hover:text-white active:text-white">Política
                                de Cookies</a>
                        </div>
                    </nav>
                </div>
                <!-- nav - end -->
            </div>

            <div class="border-t border-gray-800 py-8 text-center text-sm text-gray-400">
                © {{ date('Y') }} - Aios Real Estate . Todo los Derechos Reservados.</div>
        </footer>
    </div>
    <!-- END FOOTER -->
</body>

<script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js" defer></script>
<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>

</html>
