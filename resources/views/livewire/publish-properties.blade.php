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
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

             <!--INCLUDE ALERTS MESSAGES-->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
             <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

             <x-message-success />
             <!-- END INCLUDE ALERTS MESSAGES-->


             <!-- FORM WIZARD -->
             <div class="flex items-center justify-center p-12">
                 <div class="mx-auto w-full max-w-7xl bg-white">
                     <form id="wizardForm" action="{{ route('publish.saveProperty') }}" method="POST"
                         enctype="multipart/form-data" autocomplete="off">
                         @csrf


                         <!--START PROGRESS BAR CSS-->
                         <div class="progress-bar">
                             <div class="progress" style="width: 25%;"></div>
                         </div>
                         <div class="step-indicator font-semibold" style="color: #10b981">Step 1 of 3</div>

                         <!--ENDPROGRESS BAR CSS-->


                         <div class="step" data-step="1">
                             <h3 class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                                 Información</h3>
                             <div class="mb-5">
                                 <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Título
                                 </label>
                                 <input type="text" required placeholder="Ingresa un Título"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="title" name="title" />
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
                             <div class="mb-5">
                                 <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Descripción
                                 </label>
                                 <textarea name="description" required id="description" placeholder="Ingresa una Descripción" rows="5"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                 @error('description')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>

                             <div class="-mx-3 flex flex-wrap">
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="propertyType"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Tipo de Propiedad
                                         </label>
                                         <select required name="property_type" id="property_type"
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
                                         <label for="transaction_type"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Transacción Tipo
                                         </label>
                                         <select name="transaction_type" required id="transaction_type"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                             <option value=""></option>
                                             @foreach ($transactionRender as $item)
                                                 <option value="{{ $item->id }}">
                                                     {{ $item->transaction_description }}
                                                 </option>
                                             @endforeach
                                         </select>
                                         @error('transaction_type')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>

                                 </div>
                             </div>

                             <div class="-mx-3 flex flex-wrap">
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="description"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Dirección Propiedad
                                         </label>
                                         <input type="text" required id="autocomplete" name="location"
                                             placeholder="Location"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                         @error('location')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="description"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Ciudad
                                         </label>
                                         <input type="text" readonly id="city" name="city"
                                             placeholder="Ciudad"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                         @error('city')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror

                                         <input type="hidden" id="latitudeArea" name="latitudeArea"
                                             class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                                         <input type="hidden" id="longitudeArea" name="longitudeArea"
                                             class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                                     </div>

                                 </div>
                             </div>
                             <!-- Add more fields for Step 1 if needed -->
                         </div>

                         <div class="step" data-step="2">
                             <h3
                                 class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                                 Especificaciones</h3>
                             <div class="-mx-3 flex flex-wrap">
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="bedrooms"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Habitaciones
                                         </label>
                                         <input type="number" required placeholder="Cantidad Dormitorios"
                                             class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                             id="bedrooms" name="bedrooms" />
                                         @error('bedrooms')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="bathrooms"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Baños
                                         </label>
                                         <input type="number" required placeholder="Cantidad de Baños"
                                             class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                             id="bathrooms" name="bathrooms" />
                                         @error('bathrooms')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                             </div>

                             <div class="mb-10" id="dynamicTable2">
                                 <label for="propertyType"
                                     class="mb-3 block capitalize text-base font-medium text-[#07074D]">
                                     Características básicas
                                 </label>

                                 <div class="flex items-center mb-5">
                                     <input type="text" name="addmore2[0][features]"
                                         placeholder="Ej: Amueblado y cocina equipada" required
                                         class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md flex-grow mr-4" />
                                     @error('features.0')
                                         <span class="text-red-500">{{ $message }}</span>
                                     @enderror
                                     <div>
                                         <button type="button" name="add2" id="add2"
                                             class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out">Add
                                         </button>
                                     </div>
                                 </div>

                                 <script type="text/javascript">
                                     var i = 0;

                                     $("#add2").click(function() {
                                         ++i;
                                         $("#dynamicTable2").append('<div class="flex items-center mb-5"><input type="text" name="addmore2[' +
                                             i +
                                             '][features]" placeholder="Agregar Característica" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" /><button type="button" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out remove-tr2"><i class="fa-solid fa-trash-can"></i></button></div>'
                                         );
                                     });

                                     $(document).on('click', '.remove-tr2', function() {
                                         $(this).closest('div').remove();
                                     });
                                 </script>

                             </div>

                             <div class="mb-5">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Características adicionales (Opcional)
                                 </label>
                                 <textarea name="additional_features" id="additional_features"
                                     placeholder="Cualquier característica adicional relevante, como piscina, jardín, garaje, etc... que desees informar a los visitantes"
                                     rows="5"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                 @error('additional_features')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>


                             <div class="mb-10" id="dynamicTable">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Equipamiento
                                 </label>

                                 <div class="flex items-center mb-5">
                                     <input type="text" name="addmore[0][equipments]"
                                         placeholder="Ej: Aire acondicionado" required
                                         class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none  focus:shadow-md flex-grow mr-4" />
                                     @error('equipments.0')
                                         <span class="text-red-500">{{ $message }}</span>
                                     @enderror
                                     <div>
                                         <button type="button" name="add" id="add"
                                             class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out">Add
                                         </button>
                                     </div>
                                 </div>

                                 <script type="text/javascript">
                                     var i = 0;

                                     $("#add").click(function() {
                                         ++i;
                                         $("#dynamicTable").append('<div class="flex items-center mb-5"><input type="text" name="addmore[' + i +
                                             '][equipments]" placeholder="Agregar  Equipo" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" /><button type="button" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out remove-tr"><i class="fa-solid fa-trash-can"></i></button></div>'
                                         );
                                     });

                                     $(document).on('click', '.remove-tr', function() {
                                         $(this).closest('div').remove();
                                     });
                                 </script>

                             </div>
                             <div class="-mx-3 flex flex-wrap">
                                 <div class="w-full px-3 sm:w-1/3">
                                     <div class="mb-7">
                                         <label for="transaction_type"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Total Area Por M²
                                         </label>
                                         <input type="number" placeholder="Total Area" id="total_area"
                                             name="total_area"
                                             class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                         @error('total_area')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="w-full px-3 sm:w-1/3">
                                     <div class="mb-7">
                                         <label for="propertyType"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Certificado energético
                                         </label>
                                         <select name="energy_certificate" id="energy_certificate"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                             <option value=""></option>
                                             @for ($i = 65; $i <= 71; $i++)
                                                 <option value="{{ chr($i) }}">{{ chr($i) }}</option>
                                             @endfor
                                         </select>
                                         @error('energy_certificate')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="w-full px-3 sm:w-1/3">
                                     <div class="mb-7">
                                         <label for="garage"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Garaje
                                         </label>
                                         <select name="garage" id="garage"
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

                             <div class="mb-5">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Precio
                                 </label>
                                 <input type="text" placeholder="Ingrese Precio Total"
                                     class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="price" name="price" />
                                 @error('price')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>

                             <!-- Add more fields for Step 2 if needed -->
                         </div>

                         <div class="step" data-step="3">
                             <h3 class="mb-5 text-center text-green-600 lg:text-xl sm:text-base font-bold capitalize">
                                 Finalizar Registro
                             </h3>
                             <div x-data="dataFileDnD()"
                                 class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                 <div x-ref="dnd"
                                     class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                     <input accept="*" type="file" name="images[]" id="images" required
                                         multiple
                                         class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                         @change="addFiles($event)"
                                         @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                         @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                         @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                         title="" />

                                     <div class="flex flex-col items-center justify-center py-10 text-center">
                                         <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                         </svg>
                                         <p class="m-0">Drag your files here or click in this area.</p>
                                     </div>
                                 </div>

                                 <template x-if="files.length > 0">
                                     <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6"
                                         @drop.prevent="drop($event)"
                                         @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                         <template x-for="(_, index) in Array.from({ length: files.length })">
                                             <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                 style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                 @dragend="fileDragging = null"
                                                 :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                                                 :data-index="index">
                                                 <button
                                                     class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                     type="button" @click="remove(index)">
                                                     <svg class="w-4 h-4 text-gray-700"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round"
                                                             stroke-width="2"
                                                             d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                     </svg>
                                                 </button>
                                                 <template x-if="files[index].type.includes('audio/')">
                                                     <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round"
                                                             stroke-width="2"
                                                             d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                     </svg>
                                                 </template>
                                                 <template
                                                     x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                     <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round"
                                                             stroke-width="2"
                                                             d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                     </svg>
                                                 </template>
                                                 <template x-if="files[index].type.includes('image/')">
                                                     <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                         x-bind:src="loadFile(files[index])" />
                                                 </template>
                                                 <template x-if="files[index].type.includes('video/')">
                                                     <video
                                                         class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                         <fileDragging x-bind:src="loadFile(files[index])"
                                                             type="video/mp4">
                                                     </video>
                                                 </template>

                                                 <div
                                                     class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                     <span class="w-full font-bold text-gray-900 truncate"
                                                         x-text="files[index].name">Loading</span>
                                                     <span class="text-xs text-gray-900"
                                                         x-text="humanFileSize(files[index].size)">...</span>
                                                 </div>

                                                 <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                     @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                                     :class="{
                                                         'bg-blue-200 bg-opacity-80': fileDropping == index &&
                                                             fileDragging != index
                                                     }">
                                                 </div>
                                             </div>
                                         </template>
                                     </div>
                                 </template>
                                 @error('images')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>


                         </div>



                         <!-- Add more steps if needed -->

                         <div class="flex items-center justify-between mt-10">
                             <div>
                                 <button id="prevBtn"
                                     class="px-6 py-3 rounded-md bg-red-800 duration-500 ease-in-out hover:bg-red-500 text-white font-medium "
                                     type="button"> <i class="fa-solid fa-arrow-left mr-1"></i> Anterior</button>
                             </div>
                             <div>
                                 <button id="nextBtn"
                                     class="px-6 py-3 rounded-md bg-[#07074D] text-white font-medium duration-500 ease-in-out hover:bg-[#6A64F1]"
                                     type="button">Siguiente <i class="fa-solid fa-arrow-right ml-1"></i>
                                 </button>



                                 <button id="submitBtn" type="submit"
                                     class="hidden px-6 py-3 capitalize  rounded-md bg-green-700 text-white  font-medium duration-500 ease-in-out hover:bg-green-400">
                                     {{ __('Publicar Anuncio') }}</button>

                             </div>
                         </div>
                     </form>
                 </div>
             </div>


         </div>
     </div>
 </div>



 <style>
     .progress-bar {
         background-color: #e5e7eb;
         height: 10px;
         border-radius: 5px;
     }

     .progress-bar .progress {
         background-color: #10b981;
         height: 100%;
         width: 0;
         border-radius: 5px;
         transition: width 0.3s ease-in-out;
     }

     .step-indicator {
         font-size: 14px;
         margin-top: 10px;
     }
 </style>
 <script>
     const progressBar = document.querySelector('.progress-bar .progress');
     const nextButton = document.querySelector('#nextBtn');
     const prevButton = document.querySelector('#prevBtn');
     const stepIndicator = document.querySelector('.step-indicator');
     const totalSteps = 3;
     let currentStep = 1;

     function updateProgress() {
         const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
         progressBar.style.width = progressPercentage + '%';
         stepIndicator.innerText = 'Step ' + currentStep + ' of ' + totalSteps;
     }

     function nextStep() {
         if (currentStep < totalSteps) {
             currentStep++;
             updateProgress();
         }
     }

     function prevStep() {
         if (currentStep > 1) {
             currentStep--;
             updateProgress();
         }
     }

     nextButton.addEventListener('click', nextStep);
     prevButton.addEventListener('click', prevStep);

     updateProgress();
 </script>
 <!-- START FORM WIZARD -->

 <script>
     $(document).ready(function() {
         $("#wizardForm").submit(function(e) {
             $("#submitBtn").attr("disabled", true);



             return true;


         });

         var currentStep = 0;
         var steps = $(".step");
         var submitBtn = $("#submitBtn");
         var prevBtn = $("#prevBtn");
         var nextBtn = $("#nextBtn");

         showStep(currentStep);

         function showStep(stepIndex) {
             steps.hide();
             steps.eq(stepIndex).show();
             if (stepIndex === 0) {
                 prevBtn.hide();
             } else {
                 prevBtn.show();
             }
             if (stepIndex === steps.length - 1) {
                 nextBtn.hide();
                 submitBtn.show();
             } else {
                 nextBtn.show();
                 submitBtn.hide();
             }
         }

         prevBtn.click(function() {
             if (currentStep > 0) {
                 currentStep--;
                 showStep(currentStep);
             }
         });

         nextBtn.click(function() {
             if (currentStep < steps.length - 1) {
                 if (validateStep(currentStep)) {
                     currentStep++;
                     showStep(currentStep);
                 }
             }
         });

         function validateStep(stepIndex) {
             var isValid = true;
             var inputs = steps.eq(stepIndex).find("input");

             inputs.each(function() {
                 var input = $(this);
                 if (input.val().trim() === "") {
                     isValid = false;
                     input.addClass("invalid");
                 } else {
                     input.removeClass("valid");
                 }
             });

             var selectInputs = steps.eq(stepIndex).find("select");
             selectInputs.each(function() {
                 var selectInput = $(this);
                 if (selectInput.val() === "") {
                     isValid = false;
                     selectInput.addClass("invalid");
                 } else {
                     selectInput.removeClass("valid");
                 }
             });

             var textareaInputs = steps.eq(stepIndex).find("textarea");
             textareaInputs.each(function() {
                 var textareaInput = $(this);
                 if (textareaInput.val().trim() === "") {
                     isValid = false;
                     textareaInput.addClass("invalid");
                 } else {
                     textareaInput.removeClass("valid");
                 }
             });



             return isValid;
         }
     });
 </script>


 <!-- END START FORM WIZARD -->

 <!-- START JQUERY VALIDATE -->

 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script>
     $("#wizardForm").validate({
         // Agrega la opción "errorClass" para especificar la clase CSS para los mensajes de error
         errorClass: "error-message",
         rules: {
             title: {
                 required: true,
                 minlength: 2,
                 maxlength: 300,
             },
             autocomplete: "required",
             property_type: "required",
             transaction_type: "required",
             garage: "required",
             images: "required",
             city: "required",
             energy_certificate: "required",
             price: {
                 required: true,
                 minlength: 3,

             },
             bedrooms: {
                 required: true,
                 minlength: 1,
                 maxlength: 10,
             },
             bathrooms: {
                 required: true,
                 minlength: 1,
                 maxlength: 10,
             },

             total_area: {
                 required: true,
                 minlength: 2,
                 maxlength: 10,
             },

             addmore: {
                 required: true,
                 minlength: 3,
                 maxlength: 20,

             },
             addmore2: {
                 required: true,
                 minlength: 3,
                 maxlength: 20,

             },

         }
     });
 </script>

 <style>
     input.invalid,
     select.invalid,
     textarea.invalid {
         border-color: red;


     }

     input.valid,
     select.valid,
     textarea.valid {
         border-color: green;
         /* Cambia el color de fondo a verde */
     }

     .error-message {
         color: red;

     }
 </style>
 <!--END JQUERY VALIDATE -->


 <!-- START MULTIPLE FILE ALPINE -->
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 <script src="https://unpkg.com/create-file-list"></script>
 <script>
     function dataFileDnD() {
         return {
             maxFiles: 20,
             files: [],
             fileDragging: null,
             fileDropping: null,
             humanFileSize(size) {
                 const i = Math.floor(Math.log(size) / Math.log(1024));
                 return (
                     (size / Math.pow(1024, i)).toFixed(2) * 1 +
                     " " + ["B", "kB", "MB", "GB", "TB"][i]
                 );
             },
             remove(index) {
                 let files = [...this.files];
                 files.splice(index, 1);
                 this.files = createFileList(files);
             },
             drop(e) {
                 let removed, add;
                 let files = [...this.files];

                 removed = files.splice(this.fileDragging, 1);
                 files.splice(this.fileDropping, 0, ...removed);

                 this.files = createFileList(files);

                 this.fileDropping = null;
                 this.fileDragging = null;
             },
             dragenter(e) {
                 let targetElem = e.target.closest("[draggable]");
                 this.fileDropping = targetElem.getAttribute("data-index");
             },
             dragstart(e) {
                 this.fileDragging = e.target.closest("[draggable]").getAttribute("data-index");
                 e.dataTransfer.effectAllowed = "move";
             },
             loadFile(file) {
                 const preview = document.querySelectorAll(".preview");
                 const blobUrl = URL.createObjectURL(file);

                 preview.forEach(elem => {
                     elem.onload = () => {
                         URL.revokeObjectURL(elem.src); // free memory
                     };
                 });

                 return blobUrl;
             },
             addFiles(e) {
                 const newFiles = [...e.target.files];
                 const totalFiles = this.files.length + newFiles.length;

                 if (totalFiles <= this.maxFiles) {
                     const files = createFileList([...this.files], newFiles);
                     this.files = files;
                     this.form.formData.files = [...files];
                 } else {
                     alert("No se pueden agregar más de 2 imágenes.");
                 }
             }
         };
     }
 </script>

 <!-- END MULTIPLE FILE ALPINE -->
