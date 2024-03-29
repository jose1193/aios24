@auth
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="title">
                {{ __('Planes Disponibles') }}
            </x-slot>
            <div class="bg-white p-4 flex items-center flex-wrap font-bold">
                <ul class="flex items-center">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-500">
                            <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg>
                        </a>

                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z" />
                        </svg>
                    </li>

                    <li class="inline-flex items-center">
                        <a href="{{ route('prices') }}" class="text-gray-600 hover:text-green-500">
                            {{ __('Planes Disponibles') }}
                        </a>


                    </li>


                </ul>
            </div>
        </x-slot>

        <!-- PRICES -->
        <div class="flex justify-center mt-3">
            <div class="bg-white p-4 flex items-center flex-wrap font-bold">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-base font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('prices') }}"
                                    class="ml-1 text-base  text-green-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                    Precios
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Container for demo purpose -->
        <div class="container my-20 px-6 mx-auto">

            <!-- Section: Design Block -->
            <section class="mb-32 pb-20 text-gray-800">
                <div class="block rounded-lg shadow-lg bg-white">

                    <div class=" w-full ">
                        <div class="bg-white py-6 sm:py-8 lg:py-12">
                            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                                <div x-data="{
                                    billingType: 'mes',
                                    oroPrice: {{ $oroPrice }},
                                    platinoPrice: {{ $platinoPrice }},
                                    proPrice: '39',
                                
                                }" class="min-h-full  pb-12">
                                    <div class="w-full   pb-24 text-center">
                                        <h4 class="text-2xl font-bold text-green-600">Elige el plan adecuado para ti</h4>
                                        <p class="text-sm font-semibold text-green-600 mt-2">Precios diseñados para negocios
                                            de todos
                                            los tamaños.</p>
                                        <div class="flex items-center justify-center mt-8">

                                            <button
                                                @click="
                    billingType = 'mes',
                    oroPrice = {{ $oroPrice }},
                    platinoPrice = {{ $platinoPrice }},
                    proPrice = '39'
                "
                                                class="text-green-700 font-bold px-4 py-2 rounded-tl-lg rounded-bl-lg bg-gray-200"
                                                :class=" billingType === 'mes' ? 'bg-green-200' : 'bg-gray-200'"
                                                title="Choose Monthly billing">
                                                Mensual
                                            </button>
                                            <button
                                                @click="
                    billingType = 'semestral',
                    oroPrice = {{ $oroPrice }}*6,
                    platinoPrice = {{ $platinoPrice }}*6,
                    proPrice = '421'
                "
                                                class="text-green-700 font-bold  px-4 py-2  bg-gray-200"
                                                :class=" billingType === 'semestral' ? 'bg-green-200' : 'bg-gray-200'"
                                                title="Choose Semiannual billing">
                                                Semestral
                                            </button>
                                            <button
                                                @click="
                    billingType = 'anual',
                    oroPrice = {{ $oroPrice }}*12,
                    platinoPrice = {{ $platinoPrice }}*12,
                    proPrice = '421'
                "
                                                class="text-green-700 font-bold  px-4 py-2 rounded-tr-lg rounded-br-lg bg-gray-200"
                                                :class=" billingType === 'anual' ? 'bg-green-200' : 'bg-gray-200'"
                                                title="Choose Annual billing">
                                                Anual
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-6 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 lg:gap-8">
                                        <!-- plan - start -->
                                        @foreach ($plans as $plan)
                                            @if ($plan->plan === 'Oro')
                                                <div
                                                    class="flex flex-col overflow-hidden rounded-lg border-2 border-yellow-400">
                                                    <div
                                                        class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-2 text-center text-sm font-bold uppercase tracking-widest text-white">
                                                        Más
                                                        Popular</div>

                                                    <div class="flex flex-1 flex-col p-6 pt-8">
                                                        <div class="mb-12">
                                                            <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                                {{ $plan->plan }}
                                                            </div>

                                                            <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                                                {{ $plan->plan_description }}</p>

                                                            <div class="space-y-4">
                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-yellow-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span
                                                                        class="text-gray-600">{{ $plan->position }}</span>
                                                                </div>
                                                                <!-- check - end -->
                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-yellow-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span class="text-gray-600">
                                                                        {{ $plan->number_publications }}
                                                                        Publicaciones</span>
                                                                </div>
                                                                <!-- check - end -->

                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-yellow-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span
                                                                        class="text-gray-600">{{ $plan->quantity }}</span>
                                                                </div>
                                                                <!-- check - end -->
                                                            </div>
                                                        </div>

                                                        <div class="mt-auto">
                                                            <a href="#"
                                                                class="capitalize block rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-500 px-8 py-3 text-center text-sm font-bold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-yellow-500 focus-visible:ring active:bg-yellow-700 md:text-base">
                                                                <span class="">
                                                                    €<span x-text="oroPrice">{{ $plan->pricing }}</span>
                                                                </span>
                                                                <span class="">
                                                                    / <span x-text="billingType">Mes</span>
                                                                </span></a>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- plan - end -->

                                                <!-- plan - start -->
                                            @elseif ($plan->plan === 'Free')
                                                <div
                                                    class="flex flex-col overflow-hidden rounded-lg border-2 border-green-600 sm:mt-8">
                                                    <div class="h-2 bg-green-600"></div>

                                                    <div class="flex flex-1 flex-col p-6 pt-8">
                                                        <div class="mb-12">
                                                            <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                                {{ $plan->plan }} </div>

                                                            <p class="mb-8 px-8 text-center text-gray-500">
                                                                {{ $plan->plan_description }}
                                                            </p>

                                                            <div class="space-y-4">


                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-green-600"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span class="text-gray-600"> <span
                                                                            class="text-gray-600">{{ $plan->position }}</span></span>
                                                                </div>
                                                                <!-- check - end -->
                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-green-600"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span class="text-gray-600">
                                                                        {{ $plan->number_publications }}
                                                                        Publicaciones</span>
                                                                </div>
                                                                <!-- check - end -->

                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-green-600"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span
                                                                        class="text-gray-600">{{ $plan->quantity }}</span>
                                                                </div>
                                                                <!-- check - end -->


                                                            </div>
                                                        </div>

                                                        <div class="mt-auto">
                                                            <a href="#"
                                                                class="block w-full rounded-lg bg-green-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-indigo-700 md:text-base">0€
                                                                / Free</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- plan - end -->
                                            @elseif ($plan->plan === 'Platino')
                                                <!-- plan - start -->
                                                <div
                                                    class="flex flex-col overflow-hidden rounded-lg border border-gray-600 lg:mt-8">
                                                    <div class="h-2 bg-gradient-to-r from-gray-400 to-gray-600">
                                                    </div>

                                                    <div class="flex flex-1 flex-col p-6 pt-8">
                                                        <div class="mb-12">
                                                            <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                                {{ $plan->plan }}
                                                            </div>

                                                            <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                                                {{ $plan->plan_description }}</p>

                                                            <div class="space-y-4">
                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-gray-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span
                                                                        class="text-gray-600">{{ $plan->position }}</span>
                                                                </div>
                                                                <!-- check - end -->
                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-gray-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span class="text-gray-600">
                                                                        {{ $plan->number_publications }}
                                                                        Publicaciones</span>
                                                                </div>
                                                                <!-- check - end -->

                                                                <!-- check - start -->
                                                                <div class="flex gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 shrink-0 text-gray-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 13l4 4L19 7" />
                                                                    </svg>

                                                                    <span
                                                                        class="text-gray-600">{{ $plan->quantity }}</span>
                                                                </div>
                                                                <!-- check - end -->
                                                            </div>
                                                        </div>

                                                        <div class="mt-auto">
                                                            <a href="#"
                                                                class="capitalize block rounded-lg bg-gradient-to-r from-gray-400 to-gray-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">
                                                                <span class="">
                                                                    €<span
                                                                        x-text="platinoPrice">{{ $plan->pricing }}</span>
                                                                </span>
                                                                <span class="">
                                                                    / <span x-text="billingType">Mes</span>
                                                                </span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- plan - end -->
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
            <!-- Section: Design Block -->

        </div>
        <!-- Container for demo purpose -->
        <!-- END PRICES -->

    </x-app-layout>
@endauth
<!-- END AUTH USER -->


<!-- GUEST USER -->
@guest
    @extends('layouts.guest2')
    <x-files-guests />
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <x-home-header />
        </div>
    </div>
    <!-- PRICES -->
    <div class="flex justify-center -mt-10">
        <div class="bg-white p-4 flex items-center flex-wrap font-bold">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-base font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('prices') }}"
                                class="ml-1 text-base  text-green-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Precios
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Container for demo purpose -->
    <div class="container my-10 px-6 mx-auto">

        <!-- Section: Design Block -->
        <section class="mb-32 pb-20 text-gray-800">
            <div class="block rounded-lg shadow-lg bg-white">

                <div class=" w-full ">
                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                        <div class="mx-auto max-w-screen-xl px-4 md:px-8">

                            <div x-data="{
                                billingType: 'mes',
                                oroPrice: {{ $oroPrice }},
                                platinoPrice: {{ $platinoPrice }},
                                proPrice: '39',
                            
                            }" class="min-h-full  pb-12">
                                <div class="w-full   pb-24 text-center">
                                    <h4 class="text-2xl font-bold text-green-600">Elige el plan adecuado para ti</h4>
                                    <p class="text-sm font-semibold text-green-600 mt-2">Precios diseñados para negocios
                                        de todos
                                        los tamaños.</p>
                                    <div class="flex items-center justify-center mt-8">

                                        <button
                                            @click="
                    billingType = 'mes',
                    oroPrice = {{ $oroPrice }},
                    platinoPrice = {{ $platinoPrice }},
                    proPrice = '39'
                "
                                            class="text-green-700 font-bold px-4 py-2 rounded-tl-lg rounded-bl-lg bg-gray-200"
                                            :class=" billingType === 'mes' ? 'bg-green-200' : 'bg-gray-200'"
                                            title="Choose Monthly billing">
                                            Mensual
                                        </button>
                                        <button
                                            @click="
                    billingType = 'semestral',
                    oroPrice = {{ $oroPrice }}*6,
                    platinoPrice = {{ $platinoPrice }}*6,
                    proPrice = '421'
                "
                                            class="text-green-700 font-bold  px-4 py-2  bg-gray-200"
                                            :class=" billingType === 'semestral' ? 'bg-green-200' : 'bg-gray-200'"
                                            title="Choose Semiannual billing">
                                            Semestral
                                        </button>
                                        <button
                                            @click="
                    billingType = 'anual',
                    oroPrice = {{ $oroPrice }}*12,
                    platinoPrice = {{ $platinoPrice }}*12,
                    proPrice = '421'
                "
                                            class="text-green-700 font-bold  px-4 py-2 rounded-tr-lg rounded-br-lg bg-gray-200"
                                            :class=" billingType === 'anual' ? 'bg-green-200' : 'bg-gray-200'"
                                            title="Choose Annual billing">
                                            Anual
                                        </button>
                                    </div>
                                </div>


                                <div class="mb-6 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 lg:gap-8">
                                    <!-- plan - start -->
                                    @foreach ($plans as $plan)
                                        @if ($plan->plan === 'Oro')
                                            <div
                                                class="flex flex-col overflow-hidden rounded-lg border-2 border-yellow-400">
                                                <div
                                                    class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-2 text-center text-sm font-bold uppercase tracking-widest text-white">
                                                    Más
                                                    Popular</div>

                                                <div class="flex flex-1 flex-col p-6 pt-8">
                                                    <div class="mb-12">
                                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                            {{ $plan->plan }}
                                                        </div>

                                                        <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                                            {{ $plan->plan_description }}</p>

                                                        <div class="space-y-4">
                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-yellow-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">{{ $plan->position }}</span>
                                                            </div>
                                                            <!-- check - end -->
                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-yellow-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">
                                                                    {{ $plan->number_publications }} Publicaciones</span>
                                                            </div>
                                                            <!-- check - end -->

                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-yellow-500"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">{{ $plan->quantity }}</span>
                                                            </div>
                                                            <!-- check - end -->
                                                        </div>
                                                    </div>

                                                    <div class="mt-auto">
                                                        <a href="#"
                                                            class="capitalize block rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-500  px-8 py-3 text-center text-sm font-bold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-yellow-500 focus-visible:ring active:bg-yellow-700 md:text-base">
                                                            <span class="">
                                                                €<span x-text="oroPrice">{{ $plan->pricing }}</span>
                                                            </span>
                                                            <span class="">
                                                                / <span x-text="billingType">Mes</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- plan - end -->

                                            <!-- plan - start -->
                                        @elseif ($plan->plan === 'Free')
                                            <div
                                                class="flex flex-col overflow-hidden rounded-lg border-2 border-green-600 sm:mt-8">
                                                <div class="h-2 bg-green-600"></div>

                                                <div class="flex flex-1 flex-col p-6 pt-8">
                                                    <div class="mb-12">
                                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                            {{ $plan->plan }} </div>

                                                        <p class="mb-8 px-8 text-center text-gray-500">
                                                            {{ $plan->plan_description }}
                                                        </p>

                                                        <div class="space-y-4">


                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-green-600" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600"> <span
                                                                        class="text-gray-600">{{ $plan->position }}</span></span>
                                                            </div>
                                                            <!-- check - end -->
                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-green-600" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">
                                                                    {{ $plan->number_publications }} Publicaciones</span>
                                                            </div>
                                                            <!-- check - end -->

                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-green-600" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">{{ $plan->quantity }}</span>
                                                            </div>
                                                            <!-- check - end -->


                                                        </div>
                                                    </div>

                                                    <div class="mt-auto">
                                                        <a href="#"
                                                            class="block w-full rounded-lg bg-green-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-indigo-700 md:text-base">0€
                                                            / Free</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- plan - end -->
                                        @elseif ($plan->plan === 'Platino')
                                            <!-- plan - start -->
                                            <div
                                                class="flex flex-col overflow-hidden rounded-lg border border-gray-600 lg:mt-8">
                                                <div class="h-2 bg-gradient-to-r from-gray-400 to-gray-600">
                                                </div>

                                                <div class="flex flex-1 flex-col p-6 pt-8">
                                                    <div class="mb-12">
                                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                                            {{ $plan->plan }}
                                                        </div>

                                                        <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                                            {{ $plan->plan_description }}</p>

                                                        <div class="space-y-4">
                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-gray-500" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">{{ $plan->position }}</span>
                                                            </div>
                                                            <!-- check - end -->
                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-gray-500" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">
                                                                    {{ $plan->number_publications }} Publicaciones</span>
                                                            </div>
                                                            <!-- check - end -->

                                                            <!-- check - start -->
                                                            <div class="flex gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 shrink-0 text-gray-500" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>

                                                                <span class="text-gray-600">{{ $plan->quantity }}</span>
                                                            </div>
                                                            <!-- check - end -->
                                                        </div>
                                                    </div>

                                                    <div class="mt-auto">
                                                        <a href="#"
                                                            class="capitalize block rounded-lg bg-gradient-to-r from-gray-400 to-gray-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">
                                                            <span class="">
                                                                €<span x-text="platinoPrice">{{ $plan->pricing }}</span>
                                                            </span>
                                                            <span class="">
                                                                / <span x-text="billingType">Mes</span>
                                                            </span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- plan - end -->
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        <!-- Section: Design Block -->

    </div>
    <!-- Container for demo purpose -->
    <!-- END PRICES -->

    <x-footer />
@endguest
<!-- END GUEST USER -->
