<!--  AUTH USER -->
@auth
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="title">
                Resultados: {{ $resultCount }} en {{ $searchTerm }}

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

        <div class="mb-10 w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">


            <div class="flex items-center justify-between mt-4">
                <p class="font-medium">
                    Filters
                </p>

                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                    Reset Filter
                </button>
            </div>

            <div id="filters">
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-7 gap-4 mt-4">

                    <select wire:change="updatedSelectedTransactionType"
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value=""> Transacción Tipo</option>
                        @foreach ($transactionRender as $item)
                            <option value="{{ $item->id }}">{{ $item->transaction_description }}
                            </option>
                        @endforeach
                    </select>

                    <select
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Propiedad Tipo</option>
                        @foreach ($propertyTypesRender as $item)
                            <option value="{{ $item->id }}">{{ $item->property_description }}
                            </option>
                        @endforeach
                    </select>

                    <div class="flex">
                        <input type="number"
                            class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            id="min-input" placeholder="Mín">
                        <input type="number"
                            class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            id="max-input" placeholder="Máx">
                    </div>


                    <div class="flex">
                        <select
                            class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            id="min-select">
                            <option value="">Mín</option>
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
                        <select
                            class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                            id="max-select">
                            <option value="">Máx</option>
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

                    <select
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Habitaciones</option>
                        <option value="1">1 Habitación</option>
                        <option value="2">2 Habitación</option>
                        <option value="3">3 Habitación</option>
                        <option value="4">4 Habitación</option>
                        <option value="5">5 Habitación o más</option>
                    </select>

                    <select
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Baños</option>
                        <option value="1">1 Baño</option>
                        <option value="2">2 Baños</option>
                        <option value="3">3 Baños</option>
                        <option value="4">4 Baños</option>
                        <option value="5">5 Baños o más</option>
                    </select>

                    <select
                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="">Garaje</option>
                        <option value="Garaje Incluido">Incluido</option>
                        <option value="Garaje No Incluido">No Incluido</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- END SEARCH FILTERS -->
        <div class="w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-20 mb-20 bg-white ">


            <div class="mapContainer " style="width: 100%;position: relative;">
                <!-- @foreach ($collections as $property)
    <a class="direction-link" target="_blank"
                                                                href="//maps.google.com/maps?f=d&amp;daddr={{ $property->latitudeArea }},{{ $property->longitudeArea }}&amp;hl=en">
                                                                Get Directions</a>
    @endforeach -->
                <div id="map" style="width: 100%; height:500px;"></div>
            </div>

            <script>
                function initMap() {
                    var test = {

                        lat: {{ $latitude }},
                        lng: {{ $longitude }}
                    };
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: test
                    });

                    @foreach ($collections as $property)
                        var propertyPosition = {
                            lat: {{ $property->latitudeArea }},
                            lng: {{ $property->longitudeArea }},
                        };
                        var marker = new google.maps.Marker({
                            position: propertyPosition,
                            map: map,
                            title: "{{ $property->title }}",
                            label: {
                                text: "{{ $property->price }} €",
                                color: "#000",
                                fontWeight: "bold",
                                fontSize: "14px"
                            },
                            url: 'https://maps.google.com/maps?f=d&daddr={{ $property->latitudeArea }},{{ $property->longitudeArea }}&hl=en'
                        });
                        // Agregar evento de clic al marcador para redireccionar al enlace
                        marker.addListener('click', function() {
                            window.open(this.url);
                        });
                    @endforeach
                }

                // Cargar el script de la API de Google Maps de forma asíncrona
                function loadGoogleMapsScript() {
                    var script = document.createElement('script');
                    script.src =
                        'https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap';
                    script.defer = true;
                    script.async = true;
                    document.head.appendChild(script);
                }

                // Llamar a la función para cargar el script de la API de Google Maps
                loadGoogleMapsScript();
            </script>





        </div>



    @endauth
    <!-- END AUTH USER -->

</x-app-layout>

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

    <div class="mb-10 w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-5 bg-white">


        <div class="flex items-center justify-between mt-4">
            <p class="font-medium">
                Filters
            </p>

            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                Reset Filter
            </button>
        </div>

        <div id="filters">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-7 gap-4 mt-4">

                <select wire:change="updatedSelectedTransactionType"
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value=""> Transacción Tipo</option>
                    @foreach ($transactionRender as $item)
                        <option value="{{ $item->id }}">{{ $item->transaction_description }}
                        </option>
                    @endforeach
                </select>

                <select
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value="">Propiedad Tipo</option>
                    @foreach ($propertyTypesRender as $item)
                        <option value="{{ $item->id }}">{{ $item->property_description }}
                        </option>
                    @endforeach
                </select>

                <div class="flex">
                    <input type="number"
                        class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                        id="min-input" placeholder="Mín">
                    <input type="number"
                        class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                        id="max-input" placeholder="Máx">
                </div>


                <div class="flex">
                    <select
                        class="w-1/2 px-4 py-3 rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                        id="min-select">
                        <option value="">Mín</option>
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
                    <select
                        class="w-1/2 px-4 py-3 rounded-r-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                        id="max-select">
                        <option value="">Máx</option>
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

                <select
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value="">Habitaciones</option>
                    <option value="1">1 Habitación</option>
                    <option value="2">2 Habitación</option>
                    <option value="3">3 Habitación</option>
                    <option value="4">4 Habitación</option>
                    <option value="5">5 Habitación o más</option>
                </select>

                <select
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value="">Baños</option>
                    <option value="1">1 Baño</option>
                    <option value="2">2 Baños</option>
                    <option value="3">3 Baños</option>
                    <option value="4">4 Baños</option>
                    <option value="5">5 Baños o más</option>
                </select>

                <select
                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                    <option value="">Garaje</option>
                    <option value="Garaje Incluido">Incluido</option>
                    <option value="Garaje No Incluido">No Incluido</option>
                </select>
            </div>
        </div>
    </div>
    <!-- END SEARCH FILTERS -->
    <div class="w-full md:w-11/12 mx-auto shadow p-5 rounded-lg my-20 mb-20 bg-white ">


        <div class="mapContainer " style="width: 100%;position: relative;">
            <!-- @foreach ($collections as $property)
    <a class="direction-link" target="_blank"
                                                                href="//maps.google.com/maps?f=d&amp;daddr={{ $property->latitudeArea }},{{ $property->longitudeArea }}&amp;hl=en">
                                                                Get Directions</a>
    @endforeach -->
            <div id="map" style="width: 100%; height:500px;"></div>
        </div>

        <script>
            function initMap() {
                var test = {

                    lat: {{ $latitude }},
                    lng: {{ $longitude }}
                };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: test
                });

                @foreach ($collections as $property)
                    var propertyPosition = {
                        lat: {{ $property->latitudeArea }},
                        lng: {{ $property->longitudeArea }},
                    };
                    var marker = new google.maps.Marker({
                        position: propertyPosition,
                        map: map,
                        title: "{{ $property->title }}",
                        label: {
                            text: "{{ $property->price }} €",
                            color: "#000",
                            fontWeight: "bold",
                            fontSize: "14px"
                        },
                        url: 'https://maps.google.com/maps?f=d&daddr={{ $property->latitudeArea }},{{ $property->longitudeArea }}&hl=en'
                    });
                    // Agregar evento de clic al marcador para redireccionar al enlace
                    marker.addListener('click', function() {
                        window.open(this.url);
                    });
                @endforeach
            }

            // Cargar el script de la API de Google Maps de forma asíncrona
            function loadGoogleMapsScript() {
                var script = document.createElement('script');
                script.src =
                    'https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap';
                script.defer = true;
                script.async = true;
                document.head.appendChild(script);
            }

            // Llamar a la función para cargar el script de la API de Google Maps
            loadGoogleMapsScript();
        </script>





    </div>

    <x-footer />
@endguest
<!-- END GUEST USER -->
