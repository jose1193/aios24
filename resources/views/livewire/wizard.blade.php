 <x-slot name="header">
     <x-slot name="title">
         {{ __('Publicar Nuevo Anuncio') }}
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
                 <a href="{{ route('publish') }}" :active="request() - > routeIs('publish')"
                     class="text-gray-600 hover:text-green-500">
                     {{ __('Publicar Anuncio') }}
                 </a>


             </li>


         </ul>
     </div>

 </x-slot>


 <div class="py-12 mb-20">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">

             <!--INCLUDE ALERTS MESSAGES-->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
             <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

             <x-message-success />
             <!-- END INCLUDE ALERTS MESSAGES-->

             <!--PUBLISH PROPERTY-->



             <div>
                 <div class="overflow-hidden rounded-full bg-gray-200">
                     <div id="progress-bar" class="h-2 w-{{ $currentStep }}/3 rounded-full bg-green-600"
                         style="width: calc((100% / 3) * {{ $currentStep }});"></div>
                 </div>

                 <ol class="mt-4 grid grid-cols-3 text-lg font-medium text-gray-500">
                     <li class="flex items-center justify-start sm:gap-1.5">
                         <span
                             class="{{ $currentStep != 1 ? 'hidden' : 'inline' }} sm:inline {{ $currentStep == 1 ? 'text-green-600' : 'text-gray-500' }}">Step
                             1 - Detalles</span>
                         <svg class="h-6 w-6 sm:h-5 sm:w-5 {{ $currentStep == 1 ? 'text-green-600' : 'text-gray-500' }}"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                         </svg>
                     </li>



                     <li class="flex items-center justify-center text-green-600 sm:gap-1.5">
                         <span
                             class="{{ $currentStep != 2 ? 'hidden' : 'inline' }} sm:inline {{ $currentStep != 2 ? 'text-gray-500' : '' }}">Step
                             2 - Características</span>
                         <i
                             class="fa-solid fa-pen-to-square ml-1 -mt-1 text-base sm:h-5 sm:w-5 {{ $currentStep != 2 ? 'text-gray-500' : 'text-green-600' }}"></i>
                     </li>


                     <li class="flex items-center justify-end sm:gap-1.5">
                         <span
                             class="{{ $currentStep != 3 ? 'hidden' : 'inline' }} sm:inline {{ $currentStep == 3 ? 'text-green-600' : 'text-gray-500' }}">
                             Step - 3 Registrar
                         </span>
                         <i
                             class="fa-solid fa-file-import ml-1 -mt-1 text-base sm:h-5 sm:w-5 {{ $currentStep == 3 ? 'text-green-600' : 'text-gray-500' }}"></i>
                     </li>


                 </ol>
             </div>



             <div class="flex items-center justify-center p-12 setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}"
                 id="step-1">

                 <div class="mx-auto w-full  bg-white">
                     <h3 class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                         Información</h3>

                     <div class="mb-5">
                         <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                             Título
                         </label>
                         <input type="text" placeholder="Ingresa un Título"
                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                             id="title" wire:model="title" />
                         @error('title')
                             <span class="text-red-500">{{ $message }}</span>
                             @if ($errors->has('title'))
                                 @if ($errors->first('title') === 'The title has already been taken.')
                                     <script>
                                         Swal.fire({
                                             icon: 'error',
                                             title: 'Oops...',
                                             text: 'The title has already been taken.',
                                             footer: '<a href="">Aios Real Estate</a>',

                                         });
                                     </script>
                                 @endif
                             @endif
                         @enderror

                     </div>


                     <div class="-mx-3 flex flex-wrap">
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-5">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Tipo de Propiedad
                                 </label>
                                 <select wire:model="property_type" name="property_type" id="property_type"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                     <option value=""></option>
                                     @foreach ($propertyTypesRender as $item)
                                         <option value="{{ $item->id }}">{{ $item->property_description }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('property_type')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-5">
                                 <label for="transaction_type" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Transacción Tipo
                                 </label>
                                 <select name="transaction_type" wire:model="transaction_type" id="transaction_type"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                     <option value=""></option>
                                     @foreach ($transactionRender as $item)
                                         <option value="{{ $item->id }}">{{ $item->transaction_description }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('transaction_type')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>

                         </div>
                     </div>


                     <div class="mb-5">
                         <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                             Descripción
                         </label>
                         <textarea name="description" wire:model="description" id="description" placeholder="Ingresa una Descripción"
                             rows="5"
                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                         @error('description')
                             <span class="text-red-500">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="-mx-3 flex flex-wrap">
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-5">
                                 <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Dirección Propiedad
                                 </label>
                                 <input type="text" id="autocomplete" wire:model="location" placeholder="Location"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                 @error('location')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-5">
                                 <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Ciudad
                                 </label>
                                 <input type="text" id="city" wire:model="city" placeholder="Ciudad"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                 @error('city')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror

                                 <input type="text" id="latitudeArea" wire:model="latitudeArea"
                                     class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                                 <input type="text" id="longitudeArea" wire:model="longitudeArea"
                                     class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                             </div>

                         </div>
                     </div>

                     <div class="flex justify-end">
                         <x-button4 wire:click="firstStepSubmit" class="mt-5" type="button">Next <i
                                 class="fa-solid fa-arrow-right ml-4"></i>
                         </x-button4>
                     </div>

                 </div>
             </div>


             <div class="flex items-center justify-center p-12 setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}"
                 id="step-2">
                 <div class="mx-auto w-full  bg-white">

                     <h3 class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                         Especificaciones</h3>

                     <div class="-mx-3 flex flex-wrap">
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-7">
                                 <label for="bedrooms" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Habitaciones
                                 </label>
                                 <input type="number" placeholder="Cantidad Dormitorios"
                                     class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="bedrooms" wire:model="bedrooms" />
                                 @error('bedrooms')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="w-full px-3 sm:w-1/2">
                             <div class="mb-7">
                                 <label for="bathrooms" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Baños
                                 </label>
                                 <input type="number" placeholder="Cantidad de Baños"
                                     class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="bathrooms" wire:model="bathrooms" />
                                 @error('bathrooms')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                     </div>


                     <div class="mb-10">
                         <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                             Características básicas
                         </label>
                         <div class="flex items-center mb-5">
                             <input type="text" placeholder="Ej: Amueblado y cocina equipada"
                                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow"
                                 wire:model="features.0" />
                             @error('features.0')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         @foreach ($inputs as $index => $input)
                             <div class="flex items-center mb-5">
                                 <input type="text"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4"
                                     wire:model="features.{{ $input }}" />
                                 @error('features.' . $input)
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                                 <x-button-delete wire:click="remove({{ $index }})">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white inline-block"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                     </svg>
                                 </x-button-delete>
                             </div>
                         @endforeach

                         <div>
                             <x-button wire:click="add({{ $i }})">Agregar Característica +</x-button>
                         </div>
                     </div>



                     <div class="mb-7">
                         <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                             Características adicionales
                         </label>
                         <textarea name="additional_features" wire:model="additional_features" id="additional_features"
                             placeholder="Cualquier característica adicional relevante, como piscina, jardín, garaje, etc... que desees informar a los visitantes"
                             rows="5"
                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                         @error('additional_features')
                             <span class="text-red-500">{{ $message }}</span>
                         @enderror
                     </div>


                     <div class="mb-10">
                         <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                             Equipamiento
                         </label>
                         <div class="flex items-center mb-5">
                             <input type="text" placeholder="Ej: Aire acondicionado"
                                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow"
                                 wire:model="equipments.0" />
                             @error('equipments.0')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         @foreach ($inputs2 as $index => $input)
                             <div class="flex items-center mb-5">
                                 <input type="text"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4"
                                     wire:model="equipments.{{ $input }}" />
                                 @error('equipments.' . $input)
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                                 <x-button-delete wire:click="remove2({{ $index }})">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white inline-block"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                     </svg>
                                 </x-button-delete>
                             </div>
                         @endforeach

                         <div>
                             <x-button wire:click="add2({{ $e }})">Agregar Equipamiento +</x-button>
                         </div>
                     </div>

                     <div class="-mx-3 flex flex-wrap">
                         <div class="w-full px-3 sm:w-1/3">
                             <div class="mb-7">
                                 <label for="transaction_type"
                                     class="mb-3 block text-base font-medium text-[#07074D]">
                                     Total Area Por M²
                                 </label>
                                 <input type="number" placeholder="Total Area" id="total_area"
                                     wire:model="total_area"
                                     class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                 @error('total_area')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div class="w-full px-3 sm:w-1/3">
                             <div class="mb-7">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Certificado energético
                                 </label>
                                 <select name="energy_certificate" wire:model="energy_certificate"
                                     id="energy_certificate"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                     <option value=""></option>
                                     @for ($i = 65; $i <= 71; $i++)
                                         <option value="{{ chr($i) }}">{{ chr($i) }}</option>
                                     @endfor
                                 </select>
                                 @error('status')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>

                         <div class="w-full px-3 sm:w-1/3">
                             <div class="mb-7">
                                 <label for="garage" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Garaje
                                 </label>
                                 <select name="garage" wire:model="garage" id="garage"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                     <option value=""></option>
                                     <option value="Garaje Incluido">Incluido</option>
                                     <option value="Garaje No Incluido">No Incluido</option>

                                 </select>
                                 @error('garage')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                     </div>



                     <div class="flex justify-between mt-7">
                         <x-button-delete wire:click="back(1)">
                             <i class="fa-solid fa-arrow-left mr-4"></i> Back
                         </x-button-delete>

                         <x-button4 wire:click="secondStepSubmit">
                             Next <i class="fa-solid fa-arrow-right ml-4"></i>
                         </x-button4>
                     </div>




                 </div>
             </div>

             <div class="flex items-center justify-center p-12 setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}"
                 id="step-3">
                 <div class="mx-auto w-full  bg-white">

                     <h3 class="mb-5 text-center text-green-600 lg:text-xl sm:text-base font-bold capitalize">
                         Finalizar Registro
                     </h3>

                     <div class="mb-5">

                         <!-- component -->

                         <input
                             class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                             wire:model="images" id="file_input" multiple type="file">

                         @error('images')
                             <span class="text-red-500">{{ $message }}</span>
                         @enderror
                     </div>


                     <div class="mb-5">
                         <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                             Precio
                         </label>
                         <input type="text" placeholder="Ingrese Precio Total"
                             class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                             id="price" wire:model="price" />
                         @error('price')
                             <span class="text-red-500">{{ $message }}</span>
                         @enderror
                     </div>



                     <x-button-delete wire:click="back(2)" class="mt-10"><i class="fa-solid fa-arrow-left mr-4"></i>
                         Back
                     </x-button-delete>
                     <div class="flex justify-center">
                         <x-button wire:click="saveProperty" wire:loading.attr="disabled"
                             wire:target="saveProperty,images" class="mt-5 flex justify-items-end">
                             <svg wire:loading wire:target="saveProperty"
                                 class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24">
                                 <circle class="opacity-25" cx="12" cy="12" r="10"
                                     stroke="currentColor" stroke-width="4"></circle>
                                 <path class="opacity-75" fill="currentColor"
                                     d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                 </path>
                             </svg>
                             {{ __('Publicar Anuncio') }}
                         </x-button>
                     </div>





                 </div>

             </div>


             <!--END PUBLISH PROPERTY-->

             <style>
                 .displayNone {
                     display: none;
                 }
             </style>


             <style>
                 /* Estilos para el botón del input file */
                 input[type="file"]::file-selector-button {
                     padding: 0.5rem 1rem;
                     background-color: #4A5568;
                     color: #FFF;
                     border-radius: 0.375rem;
                     border: none;
                     cursor: pointer;
                     transition: background-color 0.3s ease;
                 }

                 /* Estilos adicionales cuando el botón del input file está en estado :hover */
                 input[type="file"]::file-selector-button:hover {
                     background-color: #6B7280;
                 }
             </style>



         </div>
     </div>
 </div>
