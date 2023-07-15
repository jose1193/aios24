<!--  AUTH USER -->
@auth
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="title">
                Resultados: <span id="result-count">{{ $resultCount }}</span> en <span
                    id="search-term">{{ $searchTerm }}</span>
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
                        <a href="" class="text-gray-600 hover:text-green-500">
                            {{ $searchTerm }}
                        </a>


                    </li>


                </ul>
            </div>

        </x-slot>

        <!-- SEARCH FILTERS-->
        <form id="filters-form" method="POST" action="{{ route('search.filters.update') }}" autocomplete="off">
            @csrf
            <div class="mb-10 w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">
                <div class="flex items-center justify-between mt-4">
                    <p class="font-medium">
                        Filters
                    </p>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" placeholder="Ingresa Ciudad" id="city" name="city"
                            value="{{ $searchTerm }}"
                            class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 "
                            required>

                        @error('city')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div id="filters">
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-7 gap-4 mt-4">

                        <select name="selectedTransactionType" id="selectedTransactionType-select"
                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">

                            @if ($transactionTypes)
                                @foreach ($collections as $item)
                                    <option value="{{ $transactionTypes }}">{{ $item->transaction_description }}
                                    </option>
                                @endforeach
                            @endif
                            @foreach ($transactionRender as $item)
                                <option value="{{ $item->id }}">{{ $item->transaction_description }}</option>
                            @endforeach


                        </select>

                        <select name="selectedPropertyType" id="selectedPropertyType-select"
                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">

                            @if ($propertyTypes)
                                @foreach ($collections as $item)
                                    <option value="{{ $propertyTypes }}">{{ $item->property_description }}</option>
                                @endforeach
                            @endif
                            @foreach ($propertyTypesRender as $item)
                                <option value="{{ $item->id }}">{{ $item->property_description }}
                                </option>
                            @endforeach
                        </select>

                        <div class="flex">
                            <input type="number" name="minPrice" id="minPriceInput"
                                class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="Mín">
                            <input type="number" name="maxPrice" id="maxPriceInput"
                                class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="Máx">
                        </div>


                        <div class="flex">
                            <select name="minTotalArea" id="minTotalArea"
                                class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                <option value="">Mín M²</option>
                                <option value="40">40 M²</option>
                                <!-- Agrega opciones adicionales de 20 en 20 hasta 500 -->
                                <option value="60">60 M²</option>
                                <option value="80">80 M²</option>
                                <option value="100">100 M²</option>
                                <option value="120">120 M²</option>
                                <option value="140">140 M²</option>
                                <option value="160">160 M²</option>
                                <option value="180">180 M²</option>
                                <option value="200">200 M²</option>
                                <option value="250">250 M²</option>
                                <option value="300">300 M²</option>
                                <option value="350">350 M²</option>
                                <option value="400">400 M²</option>
                                <option value="450">450 M²</option>
                                <option value="500">500 M²</option>
                                <option value="600">600 M²</option>
                                <option value="700">700 M²</option>
                                <option value="800">800 M²</option>
                                <option value="1000">1000 M²</option>
                                <option value="Sin límites">Sin límites</option>


                                <!-- Continúa con el resto de las opciones hasta 500 -->
                            </select>
                            <select name="maxTotalArea" id="maxTotalArea"
                                class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                <option value="">Máx M²</option>
                                <!-- Agrega opciones de 20 en 20 desde 500 hasta 1000 -->
                                <option value="40">40 M²</option>
                                <!-- Agrega opciones adicionales de 20 en 20 hasta 500 -->
                                <option value="60">60 M²</option>
                                <option value="80">80 M²</option>
                                <option value="100">100 M²</option>
                                <option value="120">120 M²</option>
                                <option value="140">140 M²</option>
                                <option value="160">160 M²</option>
                                <option value="180">180 M²</option>
                                <option value="200">200 M²</option>
                                <option value="250">250 M²</option>
                                <option value="300">300 M²</option>
                                <option value="350">350 M²</option>
                                <option value="400">400 M²</option>
                                <option value="450">450 M²</option>
                                <option value="500">500 M²</option>
                                <option value="600">600 M²</option>
                                <option value="700">700 M²</option>
                                <option value="800">800 M²</option>
                                <option value="900">900 M²</option>
                                <option value="1000">1000 M²</option>
                                <option value="Sin límites">Sin límites</option>

                            </select>
                        </div>

                        <select name="bedrooms"
                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value="">Habitaciones</option>
                            <option value="1">1 Habitación</option>
                            <option value="2">2 Habitaciones</option>
                            <option value="3">3 Habitaciones</option>
                            <option value="4">4 Habitaciones</option>
                            <option value="5">5 Habitaciones o más</option>
                        </select>

                        <select name="bathrooms"
                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value="">Baños</option>
                            <option value="1">1 Baño</option>
                            <option value="2">2 Baños</option>
                            <option value="3">3 Baños</option>
                            <option value="4">4 Baños</option>
                            <option value="5">5 Baños o más</option>
                        </select>

                        <select name="garage"
                            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value="">Garaje</option>
                            <option value="Garaje Incluido">Garaje Incluido</option>
                            <option value="Garaje No Incluido">Garaje No Incluido</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <!-- END SEARCH FILTERS -->
        @if ($mapSrc)
            <div class="w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">
                <iframe class="w-full h-full mb-5" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0" src="{{ $mapSrc }}"></iframe>

                <a href="{{ route('map.view', ['searchTerm' => $searchTerm, 'propertyTypes' => $propertyTypes, 'transactionTypes' => $transactionTypes]) }}"
                    target="_blank" class="text-base text-green-700 font-semibold capitalize ml-3 mt-5">
                    <i class="fa-solid fa-location-dot"></i> Ver en Mapa
                </a>


            </div>
        @endif


        <div class="py-12 mb-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">
                    <div class="container mx-auto">



                        <div id="cards-container" class="flex flex-wrap -mx-4">

                            @forelse ($collections as $item)
                                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                                    <div
                                        class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                                        <div class="relative pb-48 overflow-hidden">
                                            <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                                <img class="absolute inset-0 h-full w-full object-cover"
                                                    src="{{ Storage::url($item->image_path) }}" alt=""></a>
                                            <span
                                                class="absolute top-1 left-5 z-10 mt-3  inline-flex  px-2 py-1 leading-none bg-green-200 text-green-800 rounded-full font-semibold uppercase tracking-wide text-xs h-6">{{ $item->transaction_description }}
                                            </span>
                                            <span id="heart"
                                                class="float-right z-10 mt-3 mr-4 inline-flex select-none animate-pulse border border-green-800 rounded-full bg-green-200 bg-opacity-70 px-2 py-1 text-xs font-semibold ">
                                                @livewire('favorites-cards', ['propertyId' => $item->id]) </span>

                                        </div>
                                        <div class="p-4">
                                            <div class="flex justify-between mb-2">
                                                <div class="mt-3 flex items-center">
                                                    <span class="font-bold text-xl">
                                                        {{ $item->price % 1 === 0 ? number_format($item->price, 0) : number_format($item->price, 2) }}</span>&nbsp;<span
                                                        class="text-sm font-semibold">€</span>
                                                </div>
                                                @if ($item->profile_photo_url)
                                                    <img class="w-24 rounded border"
                                                        src="{{ Storage::url($item->profile_photo_url) }}"
                                                        alt="Foto de perfil">
                                                @else
                                                    <div
                                                        class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600">
                                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                                    </div>
                                                @endif
                                            </div>

                                            <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                                <h2 class="mt-2 mb-2  font-bold text-green-600">
                                                    {{ Str::words($item->title, 6, '...') }}
                                                </h2>
                                            </a>
                                            <p class="text-sm"> {{ Str::words($item->description, 7, '...') }}</p>

                                        </div>
                                        <div class="p-4 border-t border-b text-xs text-gray-700">
                                            <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                                                <p class="flex items-center font-medium text-gray-800">
                                                    <i class="fa fa-bed mr-2  text-green-600"></i>
                                                    {{ $item->bedrooms }} Hab
                                                </p>

                                                <p class="flex items-center font-medium text-gray-800">
                                                    <i class="fa fa-bath mr-2 text-green-600"></i>
                                                    {{ $item->bathrooms }} Bañ
                                                </p>
                                                <p class="flex items-center font-medium text-gray-800">
                                                    <i class="fa fa-home mr-2  text-green-600"></i>
                                                    {{ $item->total_area }} m²
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex justify-end mr-4 my-3 space-x-2">
                                            <a href="tel:{{ $item->phone }}"
                                                class=" bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded-lg">
                                                <i class="fa-solid fa-phone-volume"></i>
                                            </a>

                                            <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                                class="  bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded-lg">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            @empty
                                <h5 class="text-xl text-red-600 text-center capitalize mx-auto font-semibold">no hay
                                    registros</h5>
                            @endforelse



                        </div>

                    </div>
                    {{ $collections->links() }}
                    <style>
                        .c-card img {
                            transition: transform .3s ease-in-out;
                        }

                        .c-card:hover img {
                            transform: scale(1.05);
                        }
                    </style>




                </div>
            </div>
        </div>




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

    <!-- SEARCH FILTERS-->

    <form id="filters-form" method="POST" action="{{ route('search.filters.update') }}" autocomplete="off">
        @csrf
        <div class="mb-10 w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">
            <h1 class="text-green-600 font-semibold"> Resultados: {{ $resultCount }} en {{ $searchTerm }}</h1>
            <div class="flex items-center justify-between mt-4">
                <p class="font-medium">
                    Filters
                </p>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" placeholder="Ingresa Ciudad" id="city" name="city"
                        value="{{ $searchTerm }}"
                        class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 "
                        required>

                    @error('city')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <div id="filters">
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-7 gap-4 mt-4">

                    <select name="selectedTransactionType" id="selectedTransactionType-select"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">

                        @if ($transactionTypes)
                            @foreach ($collections as $item)
                                <option value="{{ $transactionTypes }}">{{ $item->transaction_description }}
                                </option>
                            @endforeach
                        @endif
                        @foreach ($transactionRender as $item)
                            <option value="{{ $item->id }}">{{ $item->transaction_description }}</option>
                        @endforeach


                    </select>

                    <select name="selectedPropertyType" id="selectedPropertyType-select"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">

                        @if ($propertyTypes)
                            @foreach ($collections as $item)
                                <option value="{{ $propertyTypes }}">{{ $item->property_description }}</option>
                            @endforeach
                        @endif
                        @foreach ($propertyTypesRender as $item)
                            <option value="{{ $item->id }}">{{ $item->property_description }}
                            </option>
                        @endforeach
                    </select>

                    <div class="flex">
                        <input type="number" name="minPrice" id="minPriceInput"
                            class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            placeholder="Mín">
                        <input type="number" name="maxPrice" id="maxPriceInput"
                            class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            placeholder="Máx">
                    </div>


                    <div class="flex">
                        <select name="minTotalArea" id="minTotalArea"
                            class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value="">Mín M²</option>
                            <option value="40">40 M²</option>
                            <!-- Agrega opciones adicionales de 20 en 20 hasta 500 -->
                            <option value="60">60 M²</option>
                            <option value="80">80 M²</option>
                            <option value="100">100 M²</option>
                            <option value="120">120 M²</option>
                            <option value="140">140 M²</option>
                            <option value="160">160 M²</option>
                            <option value="180">180 M²</option>
                            <option value="200">200 M²</option>
                            <option value="250">250 M²</option>
                            <option value="300">300 M²</option>
                            <option value="350">350 M²</option>
                            <option value="400">400 M²</option>
                            <option value="450">450 M²</option>
                            <option value="500">500 M²</option>
                            <option value="600">600 M²</option>
                            <option value="700">700 M²</option>
                            <option value="800">800 M²</option>
                            <option value="1000">1000 M²</option>
                            <option value="Sin límites">Sin límites</option>


                            <!-- Continúa con el resto de las opciones hasta 500 -->
                        </select>
                        <select name="maxTotalArea" id="maxTotalArea"
                            class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value="">Máx M²</option>
                            <!-- Agrega opciones de 20 en 20 desde 500 hasta 1000 -->
                            <option value="40">40 M²</option>
                            <!-- Agrega opciones adicionales de 20 en 20 hasta 500 -->
                            <option value="60">60 M²</option>
                            <option value="80">80 M²</option>
                            <option value="100">100 M²</option>
                            <option value="120">120 M²</option>
                            <option value="140">140 M²</option>
                            <option value="160">160 M²</option>
                            <option value="180">180 M²</option>
                            <option value="200">200 M²</option>
                            <option value="250">250 M²</option>
                            <option value="300">300 M²</option>
                            <option value="350">350 M²</option>
                            <option value="400">400 M²</option>
                            <option value="450">450 M²</option>
                            <option value="500">500 M²</option>
                            <option value="600">600 M²</option>
                            <option value="700">700 M²</option>
                            <option value="800">800 M²</option>
                            <option value="900">900 M²</option>
                            <option value="1000">1000 M²</option>
                            <option value="Sin límites">Sin límites</option>

                        </select>
                    </div>

                    <select name="bedrooms"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Habitaciones</option>
                        <option value="1">1 Habitación</option>
                        <option value="2">2 Habitaciones</option>
                        <option value="3">3 Habitaciones</option>
                        <option value="4">4 Habitaciones</option>
                        <option value="5">5 Habitaciones o más</option>
                    </select>

                    <select name="bathrooms"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Baños</option>
                        <option value="1">1 Baño</option>
                        <option value="2">2 Baños</option>
                        <option value="3">3 Baños</option>
                        <option value="4">4 Baños</option>
                        <option value="5">5 Baños o más</option>
                    </select>

                    <select name="garage"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Garaje</option>
                        <option value="Garaje Incluido">Garaje Incluido</option>
                        <option value="Garaje No Incluido">Garaje No Incluido</option>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <!-- END SEARCH FILTERS -->
    @if ($mapSrc)
        <div class="w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">
            <iframe class="w-full h-full mb-5" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0" src="{{ $mapSrc }}"></iframe>

            <a href="{{ route('map.view', ['searchTerm' => $searchTerm, 'propertyTypes' => $propertyTypes, 'transactionTypes' => $transactionTypes]) }}"
                target="_blank" class="text-base text-green-700 font-semibold capitalize ml-3 mt-5">
                <i class="fa-solid fa-location-dot"></i> Ver en Mapa
            </a>


        </div>
    @endif

    <div class="py-12 mb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">
                <div class="container mx-auto">
                    <div id="cards-container" class="flex flex-wrap -mx-4">

                        @forelse ($collections as $item)
                            <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                                <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                                    <div class="relative pb-48 overflow-hidden">
                                        <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                            <img class="absolute inset-0 h-full w-full object-cover"
                                                src="{{ Storage::url($item->image_path) }}" alt=""></a>
                                        <span
                                            class="absolute top-1 left-5 z-10 mt-3  inline-flex  px-2 py-1 leading-none bg-green-200 text-green-800 rounded-full font-semibold uppercase tracking-wide text-xs h-6">{{ $item->transaction_description }}
                                        </span>
                                        <span id="heart"
                                            class="float-right z-10 mt-3 mr-4 inline-flex select-none animate-pulse border border-green-800 rounded-full bg-green-200 bg-opacity-70 px-2 py-1 text-xs font-semibold ">
                                            @livewire('favorites-cards', ['propertyId' => $item->id]) </span>

                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between mb-2">
                                            <div class="mt-3 flex items-center">
                                                <span class="font-bold text-xl">
                                                    {{ $item->price % 1 === 0 ? number_format($item->price, 0) : number_format($item->price, 2) }}</span>&nbsp;<span
                                                    class="text-sm font-semibold">€</span>
                                            </div>
                                            @if ($item->profile_photo_url)
                                                <img class="w-24 rounded border"
                                                    src="{{ Storage::url($item->profile_photo_url) }}"
                                                    alt="Foto de perfil">
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600">
                                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                                </div>
                                            @endif
                                        </div>

                                        <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                            <h2 class="mt-2 mb-2  font-bold text-green-600">
                                                {{ Str::words($item->title, 6, '...') }}
                                            </h2>
                                        </a>
                                        <p class="text-sm"> {{ Str::words($item->description, 7, '...') }}</p>

                                    </div>
                                    <div class="p-4 border-t border-b text-xs text-gray-700">
                                        <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                                            <p class="flex items-center font-medium text-gray-800">
                                                <i class="fa fa-bed mr-2  text-green-600"></i>
                                                {{ $item->bedrooms }} Hab
                                            </p>

                                            <p class="flex items-center font-medium text-gray-800">
                                                <i class="fa fa-bath mr-2 text-green-600"></i>
                                                {{ $item->bathrooms }} Bañ
                                            </p>
                                            <p class="flex items-center font-medium text-gray-800">
                                                <i class="fa fa-home mr-2  text-green-600"></i>
                                                {{ $item->total_area }} m²
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex justify-end mr-4 my-3 space-x-2">
                                        <a href="tel:{{ $item->phone }}"
                                            class=" bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded-lg">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                            class="  bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded-lg">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        @empty
                            <h5 class="text-xl text-red-600 text-center capitalize mx-auto font-semibold">no hay
                                registros</h5>
                        @endforelse



                    </div>
                </div>
                {{ $collections->links() }}
                <style>
                    .c-card img {
                        transition: transform .3s ease-in-out;
                    }

                    .c-card:hover img {
                        transform: scale(1.05);
                    }
                </style>




            </div>
        </div>
    </div>


    <x-footer />
@endguest
<!-- END GUEST USER -->
