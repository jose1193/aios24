<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#22c55e" />

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <title>AIOS Real Estate </title>


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
        ::-webkit-scrollbar {
            width: 14px;
        }

        ::-webkit-scrollbar-track {
            background-color: #e5e7eb;
            border-radius: 9px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #15803d;
            border-radius: 9px;
        }
    </style>

</head>

<body class="antialiased">

    <!-- HERO -->
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">



            <x-home-header />

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

                                <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text"
                                    id="search" placeholder="Ingresa ubicaciones o Características..." />
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


    <x-welcome2 />

    <!-- FOOTER -->
    <x-footer />
    <!-- FOOTER -->
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
