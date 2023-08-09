 <x-app-layout>
     <x-slot name="header">
         <x-slot name="title">
             {{ __('Renovación de Plan') }} {{ $plans->plan }}
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
                     <a href="{{ route('select-plan') }}" class="text-gray-600 hover:text-green-500">
                         {{ __('Planes Premiun ') }}
                     </a>


                 </li>


             </ul>
         </div>
     </x-slot>

     <div class="max-w-7xl mx-auto py-12">

         <!--INCLUDE ALERTS MESSAGES-->

         <x-message-success />


         <!-- END INCLUDE ALERTS MESSAGES-->


         <div class="max-w-7xl mx-auto py-12">
             <div class="bg-white py-6 sm:py-8 lg:py-12">
                 <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                     <div x-data="{
                         billingType: 'mes',
                         planPrice: {{ $planPrice }},
                         platinoPrice: 39,
                         proPrice: '39',
                     
                     }" class="min-h-full  pb-12">
                         <div class="w-full   pb-24 text-center">
                             <h4 class="text-2xl font-bold text-green-600">¡Renueva Tu Plan Premium y Sigue Creciendo!
                             </h4>
                             <p class="text-sm font-semibold text-green-600 mt-2">Continúa beneficiándote de las últimas
                                 actualizaciones y mejoras en nuestras funciones y servicios.</p>
                             <div class="flex items-center justify-center mt-8">

                                 <button
                                     @click="
                    billingType = 'mes',
                    planPrice = {{ $planPrice }},
                    platinoPrice = 39,
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
                    planPrice = {{ $planPrice }}*6,
                    platinoPrice = 39*6,
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
                    planPrice = {{ $planPrice }}*12,
                    platinoPrice = 39*12,
                    proPrice = '421'
                "
                                     class="text-green-700 font-bold  px-4 py-2 rounded-tr-lg rounded-br-lg bg-gray-200"
                                     :class=" billingType === 'anual' ? 'bg-green-200' : 'bg-gray-200'"
                                     title="Choose Annual billing">
                                     Anual
                                 </button>
                             </div>
                         </div>





                         <!-- component -->
                         <div class="bg-gradient-to-b from-pink-100 to-purple-200 rounded-lg -mt-5">
                             <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
                                 <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
                                     <h2 class="text-2xl text-pink-900 font-bold md:text-4xl">Mantén tu presencia
                                         constante en nuestro plataforma y aprovecha al máximo cada día.</h2>
                                 </div>
                                 <div
                                     class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
                                     <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                                         <div aria-hidden="true"
                                             class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110">
                                         </div>
                                         <div class="relative p-6 space-y-6 lg:p-8">
                                             <h3 class="text-3xl text-gray-700 font-semibold text-center">

                                                 @if ($plans->id == '2')
                                                     <span
                                                         class="bg-gradient-to-r from-yellow-400 to-yellow-500 font-semibold text-white px-2 py-1 rounded-lg">
                                                         {{ $plans->plan }}</span>
                                                 @else
                                                     <span
                                                         class="bg-gradient-to-r from-gray-400 to-gray-600 font-semibold text-white px-2 py-1 rounded-lg">{{ $plans->plan }}</span>
                                                 @endif



                                             </h3>
                                             <div>
                                                 <div class="relative flex justify-around capitalize">
                                                     <div class="flex items-end">
                                                         <span class="text-8xl text-gray-800 font-bold leading-0"
                                                             x-text="planPrice">{{ $plans->pricing }}</span>
                                                         <div class="pb-2">
                                                             <span
                                                                 class="block text-2xl text-gray-700 font-bold">€</span>
                                                             <span class="block text-xl text-purple-500 font-bold"
                                                                 x-text="billingType">Mes</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                                                 <li class="space-x-2">
                                                     <span class="text-purple-500 font-semibold">&check;</span>
                                                     <span>{{ $plans->position }}</span>
                                                 </li>
                                                 <li class="space-x-2">
                                                     <span class="text-purple-500 font-semibold">&check;</span>
                                                     <span> {{ $plans->number_publications }} Publicaciones</span>
                                                 </li>
                                                 <li class="space-x-2">
                                                     <span class="text-purple-500 font-semibold">&check;</span>
                                                     <span>{{ $plans->quantity }}</span>
                                                 </li>
                                             </ul>


                                             <form action="/session" method="POST">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                 <input type="hidden" name="plan_id" value="{{ $plans->id }}">
                                                 <input type="hidden" name="planName" value="{{ $plans->plan }}">
                                                 <input type="hidden" name="position" value="{{ $plans->position }}">
                                                 <input type="hidden" name="number_publications"
                                                     value="{{ $plans->number_publications }}">
                                                 <input type="hidden" name="duration" value="{{ $plans->duration }}">
                                                 <input type="hidden" name="quantity" value="{{ $plans->quantity }}">

                                                 <input type="hidden" name="billingType"
                                                     x-bind:value="billingType === 'mes' ? 'Mensual' : billingType === 'anual' ?
                                                         'Anual' :
                                                         billingType === 'semestral' ? 'Semestral' : ''">


                                                 <input type="hidden" name="pricing"
                                                     x-bind:value="billingType === 'mes' ? planPrice : billingType === 'anual' ?
                                                         planPrice :
                                                         billingType === 'semestral' ? planPrice : 0">

                                                 <button type="submit"
                                                     class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                                                     <span class="text-white font-semibold">
                                                         Renovar Plan {{ $plans->plan }}
                                                     </span>
                                                 </button>




                                             </form>


                                         </div>
                                     </div>

                                     <div class="relative group md:w-6/12 lg:w-7/12">
                                         <div aria-hidden="true"
                                             class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
                                         </div>
                                         <div
                                             class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                                             <ul role="list" class="space-y-4 py-6 text-gray-600">
                                                 <li class="space-x-2">
                                                     <span class="text-green-600 font-semibold">&check;</span>
                                                     <span>{{ $plans->plan_description }}</span>
                                                 </li>
                                                 <li class="space-x-2">
                                                     <span class="text-green-600 font-semibold">&check;</span>
                                                     <span>Sigue atrayendo nuevos clientes y oportunidades con una mayor
                                                         visibilidad y exposición.</span>
                                                 </li>

                                             </ul>
                                             <p class="text-gray-700"> </p>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>







                     </div>
                     <div class=" text-center text-sm text-gray-500 sm:text-base">Necesitas ayuda para decidir? <a
                             href="{{ route('contact') }}"
                             class=" transition duration-100 hover:text-indigo-500 active:text-indigo-600">
                             <span class="text-green-600 font-semibold tex-base">Contáctanos</span></a>
                     </div>
                 </div>
             </div>

         </div>


         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script>
             document.addEventListener('DOMContentLoaded', function() {
                 const selectButton = document.getElementById('button-free');
                 selectButton.addEventListener('click', function() {
                     Swal.fire({
                         title: 'Confirmar selección de Plan Free',
                         text: '¿Estás seguro de que quieres seleccionar este plan?',
                         icon: 'question',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Seleccionar',
                         cancelButtonText: 'Cancelar'
                     }).then((result) => {
                         if (result.isConfirmed) {
                             const planId = selectButton.getAttribute('data-plan-id');

                             // Create the data object to be sent
                             const requestData = {
                                 _token: '{{ csrf_token() }}',
                                 plan_id: planId,
                             };

                             console.log('Data being sent:', requestData);

                             // Realiza la solicitud POST con Axios
                             axios.post('{{ route('store-plan') }}', requestData)
                                 .then(response => {
                                     // Maneja la respuesta si es necesario
                                     console.log('Response:', response);

                                     // Mostrar SweetAlert de éxito
                                     Swal.fire({
                                         icon: 'success',
                                         title: 'Plan registrado con éxito',
                                         showConfirmButton: false,
                                         timer: 1500
                                     }).then(() => {
                                         // Redirigir a otra página si es necesario
                                         window.location.href =
                                             '{{ route('publish') }}';
                                     });
                                 })
                                 .catch(error => {
                                     if (error.response.status === 422) {
                                         console.log('Validation Errors:', error.response.data
                                             .errors);
                                     } else {
                                         console.error('Error:', error);
                                     }
                                 });
                         }
                     });
                 });
             });
         </script>
 </x-app-layout>
