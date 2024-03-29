<x-app-layout>
    <x-slot name="header">
        <x-slot name="title">
            {{ __('Detalles de Pago') }}
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
                    <a href="{{ route('about') }}" :active="request() - > routeIs('about')"
                        class="text-gray-600 hover:text-green-500">
                        {{ __('Nosotros') }}
                    </a>


                </li>


            </ul>
        </div>

    </x-slot>

    <!--INCLUDE ALERTS MESSAGES-->

    <x-message-success />


    <!-- END INCLUDE ALERTS MESSAGES-->
    <div class="max-w-7xl mx-auto py-8">
        <div class=" py-6 sm:py-8 lg:py-8">
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                @if (session()->has('success'))
                    <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                        <div class="md:flex">
                            <div class="w-full p-3">
                                <div class=" capitalize border rounded-lg border-dashed py-5 border-3 bg-green-600">
                                    <div class="p-3">
                                        <h5 class="text-white font-semibold">Precio</h5>
                                        <div class="flex flex-row items-end"> <span
                                                class="text-white text-3xl font-bold">{{ $pricing }}</span>
                                            <span class="mt-2 text-gray-200 font-bolder">€</span>
                                        </div>
                                    </div>
                                    <div class="flex w-full mt-3 mb-3"> <span
                                            class="border border-dashed w-full border-white"></span>
                                    </div>
                                    <div class="p-3 space-y-5">
                                        <div class="flex flex-col"> <span
                                                class="text-gray-200 font-semibold">Plan</span>
                                            <span class="text-white text-lg font-bold">{{ $planName }}</span>
                                        </div>
                                        <div class="flex flex-col"> <span class="text-gray-200 font-semibold">Tipo de
                                                facturación</span>
                                            <span class="text-white text-lg font-bold">{{ $billingType }}</span>
                                        </div>
                                        <div class="flex flex-col"> <span
                                                class="text-gray-200 font-semibold">Posición</span> <span
                                                class="text-white text-lg font-bold">{{ $position }}</span> </div>

                                        <div class="flex flex-col"> <span class="text-gray-200 font-semibold">Fecha de
                                                Renovación</span> <span
                                                class="text-white text-lg font-bold">{{ $expirationDate }}</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
