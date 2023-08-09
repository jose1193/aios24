 <x-slot name="header">
     <x-slot name="title">
         {{ __('Nuestros Planes Disponibles') }}
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
                 <a href="{{ route('solutions') }}" class="text-gray-600 hover:text-green-500">
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
                     oroPrice: {{ $oroPrice }},
                     platinoPrice: {{ $platinoPrice }},
                     proPrice: '39',
                 
                 }" class="min-h-full  pb-12">
                     <div class="w-full   pb-24 text-center">
                         <h4 class="text-2xl font-bold text-green-600">Elige el plan adecuado para ti</h4>
                         <p class="text-sm font-semibold text-green-600 mt-2">Precios diseñados para negocios de todos
                             los tamaños. Selecciona el paquete que se adapte a tus necesidades.</p>
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

                     <div class="mb-6 -mt-5 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 lg:gap-8">
                         @foreach ($plans as $plan)
                             @if ($plan->plan === 'Oro')
                                 <!-- plan - start -->
                                 <div class="relative flex flex-col rounded-lg border-2 border-yellow-400  p-4 pt-6">
                                     <div class="mb-12">
                                         <div class="absolute inset-x-0 -top-3 flex justify-center">
                                             <span
                                                 class="flex h-6 items-center justify-center rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white">Más
                                                 Popular
                                             </span>
                                         </div>

                                         <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                             {{ $plan->plan }}
                                         </div>

                                         <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                             {{ $plan->plan_description }}
                                         </p>

                                         <div class="space-y-2">
                                             <!-- check - start -->
                                             <div class="flex gap-2">
                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-6 w-6 shrink-0 text-yellow-500" fill="none"
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
                                                     class="h-6 w-6 shrink-0 text-yellow-500" fill="none"
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
                                                     class="h-6 w-6 shrink-0 text-yellow-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round"
                                                         stroke-width="2" d="M5 13l4 4L19 7" />
                                                 </svg>

                                                 <span class="text-gray-600">{{ $plan->quantity }}</span>
                                             </div>
                                             <!-- check - end -->
                                         </div>
                                     </div>

                                     <div class="mt-auto flex flex-col gap-8">
                                         <div class="flex items-end justify-center gap-1">
                                             <span class="text-4xl font-bold text-gray-700">
                                                 €<span x-text="oroPrice">{{ $plan->pricing }}</span>
                                             </span>
                                             <span class="text-xs uppercase text-gray-500">
                                                 / <span x-text="billingType">Mes</span>
                                             </span>


                                         </div>
                                         <form action="/session" method="POST">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                             <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                             <input type="hidden" name="planName" value="{{ $plan->plan }}">
                                             <input type="hidden" name="position" value="{{ $plan->position }}">
                                             <input type="hidden" name="number_publications"
                                                 value="{{ $plan->number_publications }}">
                                             <input type="hidden" name="duration" value="{{ $plan->duration }}">
                                             <input type="hidden" name="quantity" value="{{ $plan->quantity }}">

                                             <input type="hidden" name="billingType"
                                                 x-bind:value="billingType === 'mes' ? 'Mensual' : billingType === 'anual' ? 'Anual' :
                                                     billingType === 'semestral' ? 'Semestral' : ''">


                                             <input type="hidden" name="pricing"
                                                 x-bind:value="billingType === 'mes' ? oroPrice : billingType === 'anual' ? oroPrice :
                                                     billingType === 'semestral' ? oroPrice : 0">

                                             @if ($plan->id == $activePlanId)
                                                 <button type="button" disabled
                                                     class="block w-full rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out  focus-visible:ring  md:text-base">
                                                     Plan Registrado
                                                 </button>
                                             @else
                                                 <button type="submit"
                                                     class="block w-full rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out  focus-visible:ring  md:text-base">
                                                     Seleccionar Plan {{ $plan->plan }}
                                                 </button>
                                             @endif


                                         </form>
                                     </div>
                                 </div>
                                 <!-- plan - end -->
                             @elseif ($plan->plan === 'Free')
                                 <!-- plan - start -->
                                 <div class="relative flex flex-col rounded-lg border-2 border-green-600 p-4 pt-6">
                                     <div class="absolute inset-x-0 -top-3 flex justify-center">
                                         <span
                                             class="flex h-6 items-center justify-center rounded-full bg-green-600 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white">Expo.
                                             Estándar
                                         </span>
                                     </div>
                                     <div class="mb-12">
                                         <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                             {{ $plan->plan }}
                                         </div>

                                         <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                             {{ $plan->plan_description }}
                                         </p>

                                         <div class="space-y-2">
                                             <!-- check - start -->
                                             <div class="flex gap-2">
                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-6 w-6 shrink-0 text-green-600" fill="none"
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

                                     <div class="mt-auto flex flex-col gap-8">
                                         <div class="flex items-end justify-center gap-1">

                                             <span
                                                 class="text-4xl font-bold text-gray-800">€{{ $plan->pricing }}</span>
                                         </div>



                                         @if ($plan->id == $activePlanId)
                                             <button type="button" disabled
                                                 class="block w-full rounded-lg bg-green-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-indigo-700 md:text-base">
                                                 Plan Registrado
                                             </button>
                                         @else
                                             <button type="button"
                                                 class="block w-full rounded-lg bg-green-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-indigo-700 md:text-base"
                                                 id="button-free" data-plan-id="{{ $plan->id }}">
                                                 Seleccionar Plan {{ $plan->plan }}
                                             </button>
                                         @endif





                                     </div>
                                 </div>
                                 <!-- plan - end -->
                             @elseif ($plan->plan === 'Platino')
                                 <!-- plan - start -->
                                 <div class="relative flex flex-col rounded-lg border-2 border-gray-600 p-4 pt-6">
                                     <div class="mb-12">
                                         <div class="absolute inset-x-0 -top-3 flex justify-center">
                                             <span
                                                 class="flex h-6 items-center justify-center rounded-full bg-gradient-to-r from-gray-400 to-gray-600 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white">Máx.
                                                 Exposición</span>
                                         </div>

                                         <div class="mb-2 text-center text-2xl font-bold text-gray-800">
                                             {{ $plan->plan }}</div>

                                         <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                             {{ $plan->plan_description }}
                                         </p>

                                         <div class="space-y-2">
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

                                     <div class="mt-auto flex flex-col gap-8">
                                         <div class="flex items-end justify-center gap-1">
                                             <span class="text-4xl font-bold text-gray-700">
                                                 €<span x-text="platinoPrice">{{ $plan->pricing }}</span>
                                             </span>
                                             <span class="text-xs uppercase text-gray-500">
                                                 / <span x-text="billingType">Mes</span>
                                             </span>


                                         </div>
                                         <form action="/session" method="POST">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                             <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                             <input type="hidden" name="planName" value="{{ $plan->plan }}">
                                             <input type="hidden" name="position" value="{{ $plan->position }}">
                                             <input type="hidden" name="number_publications"
                                                 value="{{ $plan->number_publications }}">
                                             <input type="hidden" name="duration" value="{{ $plan->duration }}">
                                             <input type="hidden" name="quantityPlans"
                                                 value="{{ $plan->quantity }}">
                                             <input type="hidden" name="billingType"
                                                 x-bind:value="billingType === 'mes' ? 'Mensual' : billingType === 'anual' ? 'Anual' :
                                                     billingType === 'semestral' ? 'Semestral' : ''">


                                             <input type="hidden" name="pricing"
                                                 x-bind:value="billingType === 'mes' ? platinoPrice : billingType === 'anual' ?
                                                     platinoPrice :
                                                     billingType === 'semestral' ? platinoPrice : 0">


                                             @if ($plan->id == $activePlanId)
                                                 <button type="button" disabled
                                                     class="block w-full rounded-lg bg-gradient-to-r from-gray-400 to-gray-600 px-8 py-3
               text-center text-sm font-semibold 
               text-white outline-none ring-fuchsia-300
               duration-500 ease-in-out hover:bg-gray-500
               focus-visible:ring active:text-gray-700 md:text-base">
                                                     Plan Registrado
                                                 </button>
                                             @else
                                                 <button type="submit"
                                                     class="block w-full rounded-lg bg-gradient-to-r from-gray-400 to-gray-600 px-8 py-3
               text-center text-sm font-semibold 
               text-white outline-none ring-fuchsia-300
               duration-500 ease-in-out hover:bg-gray-500
               focus-visible:ring active:text-gray-700 md:text-base">
                                                     Seleccionar Plan {{ $plan->plan }}
                                                 </button>
                                             @endif




                                     </div>
                                 </div>
                                 <!-- plan - end -->
                             @endif
                         @endforeach








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
