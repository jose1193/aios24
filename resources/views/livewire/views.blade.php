 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 Publicación / {{ $publishCode }}
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
                         <a href="{{ route('views', ['publishCode' => $publishCode]) }}"
                             class="text-gray-600 hover:text-green-500">
                             Detalles del anuncio / {{ $publishCode }}
                         </a>


                     </li>


                 </ul>
             </div>
         </x-slot>




         <!-- COMPONENT -->
         <div class="flex flex-col md:flex-row py-12 mb-0 max-w-8xl mx-auto sm:px-6 lg:px-8">
             @foreach ($collections as $item)
                 <!-- Contenido de la columna 1 -->
                 <div class="xl:w-3/4 lg:w-2/5 w-full" div="principal">
                     <div class=" mb-10 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4" id="div-1">

                         <div id="fancybox">

                             @if ($images->isNotEmpty())
                                 <a data-fancybox="gallery" href="{{ Storage::url($images[0]->image_path) }}">
                                     <img src="{{ Storage::url($images[0]->image_path) }}" class="w-full"
                                         alt="Property Image">
                                 </a>
                             @endif

                             <div style="display:none">
                                 @foreach ($images as $image)
                                     @if ($loop->index !== 0)
                                         <a data-fancybox="gallery" href="{{ Storage::url($image->image_path) }}">
                                             <img src="{{ Storage::url($image->image_path) }}" alt="Property Image">
                                         </a>
                                     @endif
                                 @endforeach
                             </div>
                         </div>

                         <div class="border-b-4 border-green-600 pb-6 mb-5 mt-5">
                             <div
                                 class="mb-7 w-14 rounded border border-gray-600 text-gray-700 text-base p-1
                         text-center font-semibold">
                                 <i class="fa-solid fa-camera-retro"></i>
                                 {{ count($images) }}
                             </div>
                             <h1 class="mb-4 lg:text-3xl text-xl font-bold  lg:leading-8 leading-7 text-green-700 mt-2">
                                 {{ $item->title }}</h1>
                             <p class=" mb-4 text-sm leading-none text-gray-700 font-semibold capitalize ">
                                 {{ $item->location }}
                                 <span class="text-base text-green-700 font-semibold capitalize ml-3"> <i
                                         class="fa-solid fa-location-dot "></i> Ver Mapa</span>

                             </p>
                             <h1 class="mb-4 lg:text-3xl text-xl font-bold lg:leading-6 leading-7 mt-2">
                                 {{ $item->price % 1 === 0 ? number_format($item->price, 0) : number_format($item->price, 2) }}
                                 <span class="text-xl text-gray-500 -mt-2">€
                                     @if ($item->transaction_description === 'Venta')
                                         <span class="inline-block h-4 w-4 rounded-full bg-green-500 ml-10"></span>
                                         <span class="text-base">{{ $item->transaction_description }}</span>
                                     @elseif ($item->transaction_description === 'Alquiler' || $item->transaction_description === 'Compartir')
                                         /mes <span class="inline-block h-4 w-4 rounded-full bg-orange-500 ml-10"></span>
                                         <span class="text-base">{{ $item->transaction_description }}</span>
                                     @endif
                                 </span>
                             </h1>

                             <div class="flex mb-5">
                                 <div class="text-green-700 font-semibold text-base pr-4 border-r-2 border-gray-200">
                                     <i class="fa fa-home mr-2 "></i> {{ $item->total_area }} m²
                                 </div>

                                 <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                     <i class="fa fa-bed mr-2 "></i> {{ $item->bedrooms }} Hab.
                                 </div>
                                 <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                     <i class="fa fa-bath mr-2 "></i> {{ $item->bathrooms }} Bañ.
                                 </div>

                                 <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                     <i class="fa-solid fa-warehouse mr-2 "></i>

                                     {{ $item->garage }}
                                 </div>

                                 <div class="text-green-600 font-semibold text-base pl-4">
                                     <i class="fa-regular fa-lightbulb mr-2 text-green-600"></i>
                                     Certif. E
                                     @if ($item->energy_certificate >= 'A' && $item->energy_certificate <= 'C')
                                         <span
                                             class=" ml-2 bg-green-200 px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                     @elseif ($item->energy_certificate >= 'D' && $item->energy_certificate <= 'F')
                                         <span
                                             class=" ml-2 bg-yellow-200 px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                     @else
                                         <span
                                             class=" ml-2 bg-red-500 text-white px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                     @endif
                                 </div>
                             </div>





                             <div class="flex justify-between sm:mt-7">
                                 <p class="text-base font-semibold lg:leading-6 leading-7 text-gray-700 mb-4">
                                     Estatus: <span
                                         class="text-green-600 font-semibold">{{ $item->estatus_description }}</span>
                                 </p>

                                 <div class="space-x-2">


                                     @livewire('favorites', ['propertyId' => $item->id])



                                     <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownads"
                                         class="rounded-md bg-white mt-3 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                         type="button">Compartir <i class="fa-solid fa-share-nodes ml-3"></i>
                                     </button>
                                     <!-- Dropdown menu -->
                                     <div id="dropdownads"
                                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                         <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                             aria-labelledby="dropdownDefaultButton">
                                             <li>
                                                 <a href="#" id="copyLink"
                                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copiar
                                                     Link</a>
                                             </li>
                                             <li>
                                                 <a href="#" id="shareWhatsApp"
                                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">WhatsApp</a>
                                             </li>
                                             <li>
                                                 <a href="#" id="shareEmail"
                                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Email</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>




                         </div>
                         <p class="text-base font-semibold text-purple-600 mb-10">
                             <span><i class="fa-solid fa-calendar-check"></i></span>

                             Publicado {{ $item->created_at->diffForHumans() }}

                         </p>

                         <h1 class="mb-5  lg:text-2xl text-xl font-semibold  lg:leading-6 leading-7 text-gray-700 ">
                             Descripción</h1>
                         <p class="mb-10 text-base"> {!! $item->description !!}

                         </p>


                         <div class="md:flex  py-5 ">
                             <div class=" p-4">
                                 <h1
                                     class="mb-4 -mt-5 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                     Características básicas</h1>
                                 <ul class="list-disc">
                                     <li class="ml-6">{{ $item->total_area }} m² Total</li>
                                     <li class="ml-6">{{ $item->bedrooms }} Habitaciones</li>
                                     <li class="ml-6">{{ $item->bathrooms }} baños</li>
                                     @foreach ($features as $feature)
                                         <li class="ml-6">{{ $feature->feature_description }}</li>
                                     @endforeach

                                 </ul>

                             </div>
                             <div class=" p-4">
                                 <h1
                                     class="mb-4 -mt-5 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                     Equipamiento</h1>
                                 <ul class="list-disc">

                                     @foreach ($equipments as $equipment)
                                         <li class="ml-6">{{ $equipment->equipment_description }}</li>
                                     @endforeach

                                 </ul>
                             </div>
                         </div>


                         <div class="md:flex  py-5">
                             <div class=" p-4 ">
                                 <h1
                                     class="-mt-3 mb-3 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                     Precio</h1>
                                 <ul class="list-none">
                                     <li class=""><span class="font-semibold">Precio Total: </span>
                                         <span class="font-bold"> {{ $item->price }}
                                             €
                                             @if ($item->transaction_description === 'Venta')
                                             @else
                                                 /mes
                                             @endif
                                         </span>

                                     </li>
                                     <li class=""><span class="text-base font-semibold">Precio por
                                             m² :</span> <span
                                             class="text-base font-bold">{{ $item->price / $item->total_area }}
                                             €</span></li>


                                 </ul>

                             </div>
                             @if ($item->additional_features)
                                 <div class=" ml-5 w-3/5 p-4">
                                     <h1
                                         class="mb-4 -mt-2 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                         Características adicionales</h1>
                                     <ul class="list-none">
                                         <li><span class="font-bold">{{ $item->additional_features }}</span></li>

                                     </ul>
                                 </div>
                             @endif
                         </div>




                     </div>


                     <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4" id="div-2">
                         <div class=" p-4">
                             <h1 class="mb-2 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                 Ubicación</h1>
                             <span class="mt-2 font-bold">{{ $item->location }} </span>
                         </div>
                         <div class="relative w-full h-96">
                             <div class="absolute top-0 left-0 w-full h-full">

                                 <div class="mapContainer " style="width: 100%;position: relative;">

                                     <div id="map" style="width: 100%; height:380px;"></div>
                                 </div>

                             </div>
                         </div>

                     </div>


                 </div>
                 <!-- end Contenido de la columna 1 -->

                 <!-- Contenido de la columna 2 -->

                 <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6   " id="div-2">

                     <div class=" sticky top-0  bg-white border  border-t-8 border-green-600 rounded-lg px-4 py-4">
                         <div id="col2">

                             <h1 class="text-green-600 text-xl text-center font-bold mt-3">Contactar al
                                 anunciante
                             </h1>

                             <form id="message-form" method="POST" action="{{ route('send-message') }}"
                                 autocomplete="off">
                                 @csrf
                                 <div class="py-4 items-center justify-between">
                                     <input type="hidden" readonly name="from_id" value="{{ auth()->user()->id }}" />
                                     <input type="hidden" readonly name="title" value="{{ $item->title }}" />
                                     <input type="hidden" readonly name="publishCode"
                                         value="{{ $item->publish_code }}" />
                                     <input type="hidden" readonly name="to_id" value="{{ $item->user_id }}" />


                                     <input type="text" readonly placeholder="Tu Nombre" name="nameFrom"
                                         value="{{ auth()->user()->name }} {{ auth()->user()->lastname }}"
                                         class="mb-5 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                     @error('nameFrom')
                                         <span class="text-red-500">{{ $message }}</span>
                                     @enderror

                                     <div class="mb-5">
                                         <input id="phone" type="tel" name="phone"
                                             value="{{ auth()->user()->phone }}"
                                             class="rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                     </div>
                                     <div>
                                         <span id="valid-msg" class="hide text-green-600">✓ Valid</span>
                                         <span id="error-msg" class="hide text-red-500 "></span>
                                     </div>
                                     <input type="email" readonly placeholder="Tu Email" name="email"
                                         value="{{ auth()->user()->email }}"
                                         class="mb-5 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                         id="email" />
                                     @error('email')
                                         <span class="text-red-500">{{ $message }}</span>
                                     @enderror

                                     <textarea name="body"
                                         class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-normal text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                         placeholder="Escribe tu mensaje">¡Hola! Quiero que se comuniquen conmigo por esta propiedad en {{ $item->transaction_description }} que vi en Aios Real Estate.</textarea>
                                     @error('body')
                                         <span class="text-red-500">{{ $message }}</span>
                                     @enderror
                                 </div>

                                 @if ($item->user_id == auth()->id())
                                     <x-button id="submit-button"
                                         class="mb-5 text-base flex items-center justify-center leading-none text-white w-full py-4 cursor-not-allowed opacity-50 focus:outline-none"
                                         disabled>
                                         <i class="fa-solid fa-comments mr-3"></i>
                                         Enviar Mensaje
                                     </x-button>
                                 @else
                                     <x-button id="submit-button"
                                         class="mb-5 text-base flex items-center justify-center leading-none text-white w-full py-4 hover:bg-green-500 focus:outline-none">
                                         <i class="fa-solid fa-comments mr-3"></i>
                                         Enviar Mensaje
                                     </x-button>
                                 @endif

                             </form>



                             <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


                             <script>
                                 // Capturar el evento de envío del formulario
                                 document.getElementById('message-form').addEventListener('submit', function(e) {
                                     e.preventDefault(); // Evitar el envío del formulario normal

                                     // Obtener el botón de envío
                                     var submitButton = document.getElementById('submit-button');

                                     // Deshabilitar el botón y cambiar el texto a "Enviando"
                                     submitButton.disabled = true;
                                     submitButton.innerHTML = 'Enviando...';

                                     // Obtener los datos del formulario
                                     var formData = new FormData(this);

                                     // Enviar la solicitud AJAX
                                     axios.post(this.action, formData)
                                         .then(function(response) {
                                             // Mostrar mensaje de éxito con SweetAlert
                                             Swal.fire({
                                                 icon: 'success',
                                                 title: 'Mensaje enviado',
                                                 text: 'Tu mensaje ha sido enviado exitosamente.',
                                             });

                                             // Restablecer el formulario
                                             document.getElementById('message-form').reset();

                                             // Habilitar el botón y cambiar el texto a "Enviar Mensaje"
                                             submitButton.disabled = false;
                                             submitButton.innerHTML = 'Enviar Mensaje';
                                         })
                                         .catch(function(error) {
                                             // Mostrar mensaje de error con SweetAlert
                                             Swal.fire({
                                                 icon: 'error',
                                                 title: 'Error',
                                                 text: 'Ocurrió un error al enviar el mensaje. Por favor, inténtalo de nuevo.',
                                             });

                                             // Habilitar el botón y cambiar el texto a "Enviar Mensaje"
                                             submitButton.disabled = false;
                                             submitButton.innerHTML = 'Enviar Mensaje';
                                         });
                                 });
                             </script>





                             <div>

                                 <p class="text-base leading-4 mt-7 text-gray-600 font-semibold">Referencia
                                     Anuncio:
                                     <span class="text-green-600 font-semibold">{{ $publishCode }}</span>
                                 </p>


                             </div>
                             <div class="border-t  py-4 mt-7 border-gray-200">
                                 <p class="text-base leading-4 text-gray-600 font-semibold">Anunciante
                                 </p>

                                 <div class="flex justify-between items-center">
                                     <p
                                         class="md:w-96 text-base leading-normal text-green-600 font-semibold capitalize mt-4">
                                         {{ $item->name }} {{ $item->lastname }}</p>

                                     @if ($item->profile_photo_url)
                                         <img class="w-24 rounded border"
                                             src="{{ Storage::url($item->profile_photo_url) }}" alt="Foto de perfil">
                                     @else
                                         <div
                                             class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600">
                                             {{ strtoupper(substr($item->name, 0, 1)) }}
                                         </div>
                                     @endif

                                 </div>


                             </div>
                             <div>

                                 <div class="border-t border-b py-4 mt-7 border-gray-200 md:block hidden ">

                                     @if ($item->user_id == auth()->id())
                                         <div class="flex justify-between items-center cursor-not-allowed opacity-50">
                                             <a href="tel:{{ $item->phone }}"
                                                 class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded mr-2"
                                                 style="pointer-events: none;">
                                                 <i class="fa-solid fa-phone-volume"></i> Contactar
                                             </a>

                                             <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                                 class="bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                                 style="pointer-events: none;">
                                                 <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                                             </a>
                                         </div>
                                     @else
                                         <div class="flex justify-between items-center cursor-pointer">
                                             <a href="tel:{{ $item->phone }}"
                                                 class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded mr-2">
                                                 <i class="fa-solid fa-phone-volume"></i> Contactar
                                             </a>

                                             <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                                 class="bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                                                 <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                                             </a>
                                         </div>
                                     @endif




                                 </div>
                             </div>
                             <div>
                                 <div class="border-b py-4 border-gray-200 ">
                                     <div data-menu class="flex justify-between items-center cursor-pointer">
                                         <p class="text-base leading-4 text-gray-800 dark:text-gray-300">
                                             Reportar
                                         </p>
                                         <button
                                             class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                                             role="button" aria-label="show or hide">
                                             <svg class="transform text-gray-300 dark:text-white" width="10"
                                                 height="6" viewBox="0 0 10 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25"
                                                     stroke-linecap="round" stroke-linejoin="round" />
                                             </svg>
                                         </button>
                                     </div>
                                     <div class="hidden pt-4  text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                                         id="sect">Si tiene alguna pregunta o reportar este anuncio,
                                         contáctanos. <br><br>
                                         <a href="{{ route('contact') }}"
                                             class=" bg-indigo-700 transition duration-500 ease-in-out hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                                             <i class="fa-solid fa-headset"></i> Contactar Soporte
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>


                     </div>

                 </div>
                 <!-- end Contenido de la columna 2 -->
                 <!--  BOTTOM FIXED -->
                 <div class="fixed bottom-0 text-center left-0 right-0 sm:hidden block">
                     <div class="grid grid-cols-2 gap-4 p-4 bg-white">
                         <div>
                             <a href="tel:{{ $item->phone }}"
                                 class="block w-full bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded">
                                 <i class="fa-solid fa-phone-volume"></i> Contactar
                             </a>
                         </div>

                         <div>
                             <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                 class="block w-full bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                                 <i class="fab fa-whatsapp"></i> WhatsApp
                             </a>
                         </div>


                     </div>
                 </div>
                 <!--  BOTTOM FIXED -->
             @endforeach

         </div>
         <!--INCLUDE ALERTS MESSAGES-->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <x-message-success />
         <!-- END INCLUDE ALERTS MESSAGES-->

         <!-- END COMPONENT -->



     </x-app-layout>
 @endauth



 <!-- GUEST USER -->
 @guest
     @extends('layouts.guest2')
     <x-files-guests />

     <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
         <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
             <x-home-header />
         </div>
     </div>

     <!--  GUESTS VIEWS  -->

     <!-- COMPONENT -->
     <div class="flex flex-col md:flex-row py-12 mb-0 max-w-8xl mx-auto sm:px-6 lg:px-8">
         @foreach ($collections as $item)
             <!-- Contenido de la columna 1 -->
             <div class="xl:w-3/4 lg:w-2/5 w-full" div="principal">
                 <div class=" mb-10 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4" id="div-1">

                     <div id="fancybox">

                         @if ($images->isNotEmpty())
                             <a data-fancybox="gallery" href="{{ Storage::url($images[0]->image_path) }}">
                                 <img src="{{ Storage::url($images[0]->image_path) }}" class="w-full"
                                     alt="Property Image">
                             </a>
                         @endif

                         <div style="display:none">
                             @foreach ($images as $image)
                                 @if ($loop->index !== 0)
                                     <a data-fancybox="gallery" href="{{ Storage::url($image->image_path) }}">
                                         <img src="{{ Storage::url($image->image_path) }}" alt="Property Image">
                                     </a>
                                 @endif
                             @endforeach
                         </div>
                     </div>

                     <div class="border-b-4 border-green-600 pb-6 mb-5 mt-5">
                         <div
                             class="mb-7 w-14 rounded border border-gray-600 text-gray-700 text-base p-1
                         text-center font-semibold">
                             <i class="fa-solid fa-camera-retro"></i>
                             {{ count($images) }}
                         </div>
                         <h1 class="mb-4 lg:text-3xl text-xl font-bold  lg:leading-8 leading-7 text-green-700 mt-2">
                             {{ $item->title }}</h1>
                         <p class=" mb-4 text-sm leading-none text-gray-700 font-semibold capitalize ">
                             {{ $item->location }}
                             <span class="text-base text-green-700 font-semibold capitalize ml-3"> <i
                                     class="fa-solid fa-location-dot "></i> Ver Mapa</span>

                         </p>
                         <h1 class="mb-4 lg:text-3xl text-xl font-bold lg:leading-6 leading-7 mt-2">
                             {{ $item->price % 1 === 0 ? number_format($item->price, 0) : number_format($item->price, 2) }}
                             <span class="text-xl text-gray-500 -mt-2">€
                                 @if ($item->transaction_description === 'Venta')
                                     <span class="inline-block h-4 w-4 rounded-full bg-green-500 ml-10"></span>
                                     <span class="text-base">{{ $item->transaction_description }}</span>
                                 @elseif ($item->transaction_description === 'Alquiler' || $item->transaction_description === 'Compartir')
                                     /mes <span class="inline-block h-4 w-4 rounded-full bg-orange-500 ml-10"></span>
                                     <span class="text-base">{{ $item->transaction_description }}</span>
                                 @endif
                             </span>
                         </h1>

                         <div class="flex mb-5">
                             <div class="text-green-700 font-semibold text-base pr-4 border-r-2 border-gray-200">
                                 <i class="fa fa-home mr-2 "></i> {{ $item->total_area }} m²
                             </div>

                             <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                 <i class="fa fa-bed mr-2 "></i> {{ $item->bedrooms }} Hab.
                             </div>
                             <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                 <i class="fa fa-bath mr-2 "></i> {{ $item->bathrooms }} Bañ.
                             </div>

                             <div class="text-green-700 font-semibold text-base pl-4 pr-4 border-r-2 border-gray-200">
                                 <i class="fa-solid fa-warehouse mr-2 "></i>

                                 {{ $item->garage }}
                             </div>

                             <div class="text-green-600 font-semibold text-base pl-4">
                                 <i class="fa-regular fa-lightbulb mr-2 text-green-600"></i>
                                 Certif. E
                                 @if ($item->energy_certificate >= 'A' && $item->energy_certificate <= 'C')
                                     <span
                                         class=" ml-2 bg-green-200 px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                 @elseif ($item->energy_certificate >= 'D' && $item->energy_certificate <= 'F')
                                     <span
                                         class=" ml-2 bg-yellow-200 px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                 @else
                                     <span
                                         class=" ml-2 bg-red-500 text-white px-3 py-1 rounded">{{ $item->energy_certificate }}</span>
                                 @endif
                             </div>
                         </div>

                         <div class="flex justify-between sm:mt-7">
                             <p class="text-base font-semibold lg:leading-6 leading-7 text-gray-700 mb-4">
                                 Estatus: <span
                                     class="text-green-600 font-semibold">{{ $item->estatus_description }}</span>
                             </p>

                             <div class="space-x-2">


                                 @livewire('favorites', ['propertyId' => $item->id])



                                 <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownads"
                                     class="rounded-md mt-3 bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                     type="button">Compartir <i class="fa-solid fa-share-nodes ml-3"></i>
                                 </button>
                                 <!-- Dropdown menu -->
                                 <div id="dropdownads"
                                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                     <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                         aria-labelledby="dropdownDefaultButton">
                                         <li>
                                             <a href="#" id="copyLink"
                                                 class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copiar
                                                 Link</a>
                                         </li>
                                         <li>
                                             <a href="#" id="shareWhatsApp"
                                                 class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">WhatsApp</a>
                                         </li>
                                         <li>
                                             <a href="#" id="shareEmail"
                                                 class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Email</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>




                     </div>
                     <p class="text-base font-semibold text-purple-600 mb-10">
                         <span><i class="fa-solid fa-calendar-check"></i></span>

                         Publicado {{ $item->created_at->diffForHumans() }}

                     </p>

                     <h1 class="mb-5  lg:text-2xl text-xl font-semibold  lg:leading-6 leading-7 text-gray-700 ">
                         Descripción</h1>
                     <p class="mb-10 text-base"> {!! $item->description !!}

                     </p>


                     <div class="md:flex  py-5 ">
                         <div class=" p-4">
                             <h1 class="mb-4 -mt-5 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                 Características básicas</h1>
                             <ul class="list-disc">
                                 <li class="ml-6">{{ $item->total_area }} m² Total</li>
                                 <li class="ml-6">{{ $item->bedrooms }} Habitaciones</li>
                                 <li class="ml-6">{{ $item->bathrooms }} baños</li>
                                 @foreach ($features as $feature)
                                     <li class="ml-6">{{ $feature->feature_description }}</li>
                                 @endforeach

                             </ul>

                         </div>
                         <div class=" p-4">
                             <h1 class="mb-4 -mt-5 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                 Equipamiento</h1>
                             <ul class="list-disc">

                                 @foreach ($equipments as $equipment)
                                     <li class="ml-6">{{ $equipment->equipment_description }}</li>
                                 @endforeach

                             </ul>
                         </div>
                     </div>


                     <div class="md:flex  py-5">
                         <div class=" p-4 ">
                             <h1 class="-mt-3 mb-3 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                 Precio</h1>
                             <ul class="list-none">
                                 <li class=""><span class="font-semibold">Precio Total: </span>
                                     <span class="font-bold"> {{ $item->price }}
                                         €
                                         @if ($item->transaction_description === 'Venta')
                                         @else
                                             /mes
                                         @endif
                                     </span>

                                 </li>
                                 <li class=""><span class="text-base font-semibold">Precio por
                                         m² :</span> <span
                                         class="text-base font-bold">{{ $item->price / $item->total_area }}
                                         €</span></li>


                             </ul>

                         </div>
                         @if ($item->additional_features)
                             <div class=" ml-5 w-3/5 p-4">
                                 <h1
                                     class="mb-4 -mt-2 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                                     Características adicionales</h1>
                                 <ul class="list-none">
                                     <li><span class="font-bold">{{ $item->additional_features }}</span></li>

                                 </ul>
                             </div>
                         @endif
                     </div>




                 </div>


                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4" id="div-2">
                     <div class=" p-4">
                         <h1 class="mb-2 lg:text-2xl text-xl font-bold  lg:leading-6 leading-7 text-gray-700 ">
                             Ubicación</h1>
                         <span class="mt-2 font-bold">{{ $item->location }} </span>
                     </div>
                     <div class="relative w-full h-96">
                         <div class="absolute top-0 left-0 w-full h-full">

                             <div class="mapContainer " style="width: 100%;position: relative;">

                                 <div id="map" style="width: 100%; height:380px;"></div>
                             </div>

                         </div>
                     </div>

                 </div>


             </div>
             <!-- end Contenido de la columna 1 -->

             <!-- Contenido de la columna 2 -->

             <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6   " id="div-2">

                 <div class=" sticky top-0  bg-white border  border-t-8 border-green-600 rounded-lg px-4 py-4">
                     <div id="col2">

                         <h1 class="text-green-600 text-xl text-center font-bold mt-3">Contactar al
                             anunciante
                         </h1>
                         <form id="message-form" method="POST" action="{{ route('send-message-guest') }}"
                             autocomplete="off">
                             @csrf
                             <div class="py-4 items-center justify-between">

                                 <input type="hidden" readonly name="title" value="{{ $item->title }}" />
                                 <input type="hidden" readonly name="publishCode" value="{{ $item->publish_code }}" />
                                 <input type="hidden" readonly name="to_id" value="{{ $item->user_id }}" />


                                 <input type="text" placeholder="Tu Nombre" name="nameFrom"
                                     class="mb-5 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                 @error('nameFrom')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror

                                 <div class="mb-5">
                                     <input id="phone" type="tel" name="phone"
                                         class="rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                 </div>
                                 <div>
                                     <span id="valid-msg" class="hide text-green-600">✓ Valid</span>
                                     <span id="error-msg" class="hide text-red-500 "></span>
                                 </div>
                                 <input type="email" placeholder="Tu Email" name="email"
                                     class="mb-5 w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="email" />
                                 @error('email')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror

                                 <textarea name="body"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-normal text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     placeholder="Escribe tu mensaje">¡Hola! Quiero que se comuniquen conmigo por esta propiedad en {{ $item->transaction_description }} que vi en Aios Real Estate.</textarea>
                                 @error('body')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>

                             <x-button id="submit-button"
                                 class="mb-5 text-2xl flex items-center justify-center leading-none text-white w-full py-4 hover:bg-green-500 focus:outline-none">
                                 <i class="fa-solid fa-comments mr-3"></i>

                                 Enviar Mensaje
                             </x-button>
                         </form>



                         <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


                         <script>
                             // Capturar el evento de envío del formulario
                             document.getElementById('message-form').addEventListener('submit', function(e) {
                                 e.preventDefault(); // Evitar el envío del formulario normal

                                 // Obtener el botón de envío
                                 var submitButton = document.getElementById('submit-button');

                                 // Deshabilitar el botón y cambiar el texto a "Enviando"
                                 submitButton.disabled = true;
                                 submitButton.innerHTML = 'Enviando...';

                                 // Obtener los datos del formulario
                                 var formData = new FormData(this);

                                 // Enviar la solicitud AJAX
                                 axios.post(this.action, formData)
                                     .then(function(response) {
                                         // Mostrar mensaje de éxito con SweetAlert
                                         Swal.fire({
                                             icon: 'success',
                                             title: 'Mensaje enviado',
                                             text: 'Tu mensaje ha sido enviado exitosamente.',
                                         });

                                         // Restablecer el formulario
                                         document.getElementById('message-form').reset();

                                         // Habilitar el botón y cambiar el texto a "Enviar Mensaje"
                                         submitButton.disabled = false;
                                         submitButton.innerHTML = 'Enviar Mensaje';
                                     })
                                     .catch(function(error) {
                                         // Mostrar mensaje de error con SweetAlert
                                         Swal.fire({
                                             icon: 'error',
                                             title: 'Error',
                                             text: 'Ocurrió un error al enviar el mensaje. Por favor, inténtalo de nuevo.',
                                         });

                                         // Habilitar el botón y cambiar el texto a "Enviar Mensaje"
                                         submitButton.disabled = false;
                                         submitButton.innerHTML = 'Enviar Mensaje';
                                     });
                             });
                         </script>



                         <div>

                             <p class="text-base leading-4 mt-7 text-gray-600 font-semibold">Referencia
                                 Anuncio:
                                 <span class="text-green-600 font-semibold">{{ $publishCode }}</span>
                             </p>


                         </div>
                         <div class="border-t  py-4 mt-7 border-gray-200">
                             <p class="text-base leading-4 text-gray-600 font-semibold">Anunciante
                             </p>

                             <div class="flex justify-between items-center">
                                 <p class="md:w-96 text-base leading-normal text-green-600 font-semibold capitalize mt-4">
                                     {{ $item->name }} {{ $item->lastname }}</p>

                                 @if ($item->profile_photo_url)
                                     <img class="w-24 rounded border" src="{{ Storage::url($item->profile_photo_url) }}"
                                         alt="Foto de perfil">
                                 @else
                                     <div
                                         class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600">
                                         {{ strtoupper(substr($item->name, 0, 1)) }}
                                     </div>
                                 @endif

                             </div>


                         </div>
                         <div>

                             <div class="border-t border-b py-4 mt-7 border-gray-200 md:block hidden ">

                                 @if ($item->user_id == auth()->id())
                                     <div class="flex justify-between items-center cursor-not-allowed opacity-50">
                                         <a href="tel:{{ $item->phone }}"
                                             class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded mr-2"
                                             style="pointer-events: none;">
                                             <i class="fa-solid fa-phone-volume"></i> Contactar
                                         </a>

                                         <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                             class="bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                             style="pointer-events: none;">
                                             <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                                         </a>
                                     </div>
                                 @else
                                     <div class="flex justify-between items-center cursor-pointer">
                                         <a href="tel:{{ $item->phone }}"
                                             class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded mr-2">
                                             <i class="fa-solid fa-phone-volume"></i> Contactar
                                         </a>

                                         <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                             class="bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                                             <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                                         </a>
                                     </div>
                                 @endif




                             </div>
                         </div>
                         <div>
                             <div class="border-b py-4 border-gray-200 ">
                                 <div data-menu class="flex justify-between items-center cursor-pointer">
                                     <p class="text-base leading-4 text-gray-800 dark:text-gray-300">
                                         Reportar
                                     </p>
                                     <button
                                         class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                                         role="button" aria-label="show or hide">
                                         <svg class="transform text-gray-300 dark:text-white" width="10"
                                             height="6" viewBox="0 0 10 6" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25"
                                                 stroke-linecap="round" stroke-linejoin="round" />
                                         </svg>
                                     </button>
                                 </div>
                                 <div class="hidden pt-4  text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                                     id="sect">Si tiene alguna pregunta o reportar este anuncio,
                                     contáctanos. <br><br>
                                     <a href="{{ route('contact') }}"
                                         class=" bg-indigo-700 transition duration-500 ease-in-out hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                                         <i class="fa-solid fa-headset"></i> Contactar Soporte
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>


                 </div>

             </div>
             <!-- end Contenido de la columna 2 -->
             <!--  BOTTOM FIXED -->
             <div class="fixed bottom-0 text-center left-0 right-0 sm:hidden block">
                 <div class="grid grid-cols-2 gap-4 p-4 bg-white">
                     <div>
                         <a href="tel:{{ $item->phone }}"
                             class="block w-full bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded">
                             <i class="fa-solid fa-phone-volume"></i> Contactar
                         </a>
                     </div>

                     <div>
                         <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                             class="block w-full bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                             <i class="fab fa-whatsapp"></i> WhatsApp
                         </a>
                     </div>


                 </div>
             </div>
             <!--  BOTTOM FIXED -->
         @endforeach

     </div>
     <!--INCLUDE ALERTS MESSAGES-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <x-message-success />
     <!-- END INCLUDE ALERTS MESSAGES-->
     <!-- END COMPONENT -->

     <!-- END GUESTS VIEWS  -->

     <x-footer />
 @endguest
 <!-- END GUEST USER -->



 <script>
     let elements = document.querySelectorAll("[data-menu]");
     for (let i = 0; i < elements.length; i++) {
         let main = elements[i];
         main.addEventListener("click", function() {
             let element = main.parentElement.parentElement;
             let andicators = main.querySelectorAll("svg");
             let child = element.querySelector("#sect");
             child.classList.toggle("hidden");
             andicators[0].classList.toggle("rotate-180");
         });
     }
 </script>

 <!--FANCYBOX -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
 <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

 <script>
     Fancybox.bind('[data-fancybox="gallery"]', {
         //
     });
 </script>
 <!--END FANCYBOX -->

 <!--BUTTONS SHARE -->
 <script>
     // Obtener la URL actual
     const currentUrl = window.location.href;

     // Obtener los elementos de los botones de compartir
     const copyLinkButton = document.getElementById('copyLink');
     const shareWhatsAppButton = document.getElementById('shareWhatsApp');
     const shareEmailButton = document.getElementById('shareEmail');

     // Evento de clic para copiar el enlace
     copyLinkButton.addEventListener('click', () => {
         navigator.clipboard.writeText(currentUrl)
             .then(() => {
                 alert('Enlace copiado al portapapeles');
             })
             .catch((error) => {
                 console.error('Error al copiar el enlace:', error);
             });
     });

     // Evento de clic para compartir por WhatsApp
     shareWhatsAppButton.addEventListener('click', () => {
         const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(currentUrl)}`;
         window.open(whatsappUrl, '_blank');
     });

     // Evento de clic para compartir por correo electrónico
     shareEmailButton.addEventListener('click', () => {
         const emailSubject = 'Echa un vistazo a este enlace';
         const emailBody = `¡Hola! Me gustaría compartir contigo este enlace: ${currentUrl}`;
         const emailUrl =
             `mailto:?subject=${encodeURIComponent(emailSubject)}&body=${encodeURIComponent(emailBody)}`;
         window.location.href = emailUrl;
     });
 </script>
 <!--END BUTTONS SHARE -->

 <!--   PHONE COUNTRY -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css" />

 <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
 <script>
     const input = document.querySelector("#phone");
     const errorMsg = document.querySelector("#error-msg");
     const validMsg = document.querySelector("#valid-msg");
     // Aquí puedes especificar el código de país de España
     const defaultCountry = "es";
     // here, the index maps to the error code returned from getValidationError - see readme
     const errorMap = [
         "Número inválido",
         "Código de país inválido",
         "Número demasiado corto",
         "Número demasiado largo",
         "Número inválido"
     ];

     // Aquí, la opción initialCountry se establece en el valor de defaultCountry
     const iti = window.intlTelInput(input, {
         initialCountry: defaultCountry,
         utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js?1684676252775"
     });

     const reset = () => {
         input.classList.remove("error");
         errorMsg.innerHTML = "";
         errorMsg.classList.add("hide");
         validMsg.classList.add("hide");
     };

     // on blur: validate
     input.addEventListener('blur', () => {
         reset();
         if (input.value.trim()) {
             if (iti.isValidNumber()) {
                 validMsg.classList.remove("hide");
             } else {
                 input.classList.add("error");
                 const errorCode = iti.getValidationError();
                 errorMsg.innerHTML = errorMap[errorCode];
                 errorMsg.classList.remove("hide");
             }
         }
     });

     // on keyup / change flag: reset
     input.addEventListener('change', reset);
     input.addEventListener('keyup', reset);
 </script>

 <style>
     .hide {
         display: none;
     }
 </style>


 <!-- END PHONE COUNTRY  -->


 <script>
     function initMap() {
         var test = {

             lat: {{ $item->latitudeArea }},
             lng: {{ $item->longitudeArea }},
         };
         var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 16,
             center: test
         });

         @foreach ($collections as $property)
             var propertyPosition = {
                 lat: {{ $item->latitudeArea }},
                 lng: {{ $item->longitudeArea }},
             };
             var marker = new google.maps.Marker({
                 position: propertyPosition,
                 map: map,
                 title: "{{ $item->title }}",
                 label: {
                     text: "{{ $item->price }} €",
                     color: "#000",
                     fontWeight: "bold",
                     fontSize: "14px"
                 },
                 url: 'https://maps.google.com/maps?f=d&daddr={{ $item->latitudeArea }},{{ $item->longitudeArea }}&hl=en'
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
