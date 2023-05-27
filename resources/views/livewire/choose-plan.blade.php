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

                 <div class="mb-6 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 lg:gap-8">
                     @foreach ($plans as $plan)
                         @if ($plan->plan === 'Oro')
                             <!-- plan - start -->
                             <div class="relative flex flex-col rounded-lg border-2 border-green-600 p-4 pt-6">
                                 <div class="mb-12">
                                     <div class="absolute inset-x-0 -top-3 flex justify-center">
                                         <span
                                             class="flex h-6 items-center justify-center rounded-full bg-green-600 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white">Más
                                             Popular
                                         </span>
                                     </div>

                                     <div class="mb-2 text-center text-2xl font-bold text-gray-800">{{ $plan->plan }}
                                     </div>

                                     <p class="mx-auto mb-8 px-8 text-center text-gray-500">
                                         {{ $plan->plan_description }}
                                     </p>

                                     <div class="space-y-2">
                                         <!-- check - start -->
                                         <div class="flex gap-2">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M5 13l4 4L19 7" />
                                             </svg>

                                             <span class="text-gray-600">{{ $plan->position }}</span>
                                         </div>
                                         <!-- check - end -->

                                         <!-- check - start -->
                                         <div class="flex gap-2">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M5 13l4 4L19 7" />
                                             </svg>

                                             <span class="text-gray-600">{{ $plan->duration }}</span>
                                         </div>
                                         <!-- check - end -->

                                         <!-- check - start -->
                                         <div class="flex gap-2">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M5 13l4 4L19 7" />
                                             </svg>

                                             <span class="text-gray-600">{{ $plan->quantity }}</span>
                                         </div>
                                         <!-- check - end -->
                                     </div>
                                 </div>

                                 <div class="mt-auto flex flex-col gap-8">
                                     <div class="flex items-end justify-center gap-1">
                                         <span class="self-start text-gray-600">$</span>
                                         <span class="text-4xl font-bold text-gray-800">{{ $plan->pricing }}</span>
                                     </div>
                                     <form action="/session" method="POST">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         <input type="hidden" name="publishCode" value="{{ $publishCode }}">
                                         <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                         <input type="hidden" name="planName" value="{{ $plan->plan }}">
                                         <input type="hidden" name="position" value="{{ $plan->position }}">
                                         <input type="hidden" name="duration" value="{{ $plan->duration }}">
                                         <input type="hidden" name="quantity" value="{{ $plan->quantity }}">
                                         <input type="hidden" name="pricing" value="{{ $plan->pricing }}">
                                         <input type="hidden" name="property_id" value="{{ $this->property_id->id }}">
                                         <button type="submit"
                                             class="block w-full rounded-lg bg-green-600 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-indigo-700 md:text-base"
                                             id="checkout-live-button">Seleccionar
                                             Plan Oro</button>



                                     </form>
                                 </div>
                             </div>
                             <!-- plan - end -->
                         @elseif ($plan->plan === 'Free')
                             <!-- plan - start -->
                             <div class="flex flex-col rounded-lg border p-4 pt-6">
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
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
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
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round"
                                                     stroke-width="2" d="M5 13l4 4L19 7" />
                                             </svg>

                                             <span class="text-gray-600">{{ $plan->duration }}</span>
                                         </div>
                                         <!-- check - end -->

                                         <!-- check - start -->
                                         <div class="flex gap-2">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
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
                                         <span class="self-start text-gray-600">$</span>
                                         <span class="text-4xl font-bold text-gray-800">{{ $plan->pricing }}</span>
                                     </div>

                                     <button disabled
                                         class="block w-full rounded-lg bg-gray-200 px-8 py-3
                                          text-center text-sm font-semibold 
                                          text-gray-500 outline-none ring-indigo-300
                                           transition duration-100 hover:bg-gray-300
                                            focus-visible:ring active:text-gray-700 md:text-base">Plan
                                         Actual</button>
                                 </div>
                             </div>
                             <!-- plan - end -->
                         @elseif ($plan->plan === 'Platino')
                             <!-- plan - start -->
                             <div class="relative flex flex-col rounded-lg border-2 border-fuchsia-700 p-4 pt-6">
                                 <div class="mb-12">
                                     <div class="absolute inset-x-0 -top-3 flex justify-center">
                                         <span
                                             class="flex h-6 items-center justify-center rounded-full bg-fuchsia-700 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white">Máx.
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
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
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
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round"
                                                     stroke-width="2" d="M5 13l4 4L19 7" />
                                             </svg>

                                             <span class="text-gray-600">{{ $plan->duration }}</span>
                                         </div>
                                         <!-- check - end -->

                                         <!-- check - start -->
                                         <div class="flex gap-2">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
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
                                         <span class="self-start text-gray-600">$</span>
                                         <span class="text-4xl font-bold text-gray-800">{{ $plan->pricing }}</span>
                                     </div>
                                     <form action="/session" method="POST">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         <input type="hidden" name="publishCode" value="{{ $publishCode }}">
                                         <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                         <input type="hidden" name="planName" value="{{ $plan->plan }}">
                                         <input type="hidden" name="position" value="{{ $plan->position }}">
                                         <input type="hidden" name="duration" value="{{ $plan->duration }}">
                                         <input type="hidden" name="quantityPlans" value="{{ $plan->quantity }}">
                                         <input type="hidden" name="pricing" value="{{ $plan->pricing }}">

                                         <input type="hidden" name="property_id"
                                             value="{{ $this->property_id->id }}">
                                         <button type="submit"
                                             class="block w-full rounded-lg bg-fuchsia-700 px-8 py-3
                                          text-center text-sm font-semibold 
                                          text-white outline-none ring-fuchsia-300
                                           duration-500 ease-in-out hover:bg-fuchsia-600
                                            focus-visible:ring active:text-gray-700 md:text-base"
                                             id="checkout-live-button">Seleccionar
                                             Plan Platino</button>

                                 </div>
                             </div>
                             <!-- plan - end -->
                         @endif
                     @endforeach








                 </div>

                 <div class="text-center text-sm text-gray-500 sm:text-base">Necesitas ayuda para decidir? <a
                         href="{{ route('contact') }}"
                         class="text-gray-500 underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">Contactanos</a>.
                 </div>
             </div>
         </div>
     </div>

 </div>
