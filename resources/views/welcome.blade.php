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
        <div class="container relative -mt-20 z-1 mx-auto flex justify-center items-center  ">
            <div class="w-2/3 -mt-10 ">
                <livewire:search-form />
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


</html>
