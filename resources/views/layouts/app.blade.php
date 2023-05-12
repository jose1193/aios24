<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#22c55e" />

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <title>AIOS Real Estate -

        @if (empty($title))
            Dashboard
        @else
            {{ $title }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />


    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
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
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}

                    @if (isset($title))
                        <h1 class="text-center text-2xl font-bold text-green-600">

                            {{ $title }}

                        </h1>
                    @endif
                </div>
            </header>
        @endif



        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>


    <!-- FOOTER -->
    <x-footer />
    <!-- FOOTER -->

    @stack('modals')

    @livewireScripts

    @stack('js')
</body>

</html>
