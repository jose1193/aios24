 <!--  AUTH USER -->
 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 {{ __('Editar Anuncio') }} / {{ $publishCode }}
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
                             {{ __('Editar Anuncio') }} - {{ $publishCode }}
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
                             <form id="wizardForm"
                                 action="{{ route('publishproperties.update', ['publishCode' => $publishCode]) }}"
                                 method="POST" enctype="multipart/form-data" autocomplete="off">


                                 @csrf
                                 @method('PUT')
                                 <!--START PROGRESS BAR CSS-->
                                 <div class="progress-bar">
                                     <div class="progress" style="width: 25%;"></div>
                                 </div>
                                 <div class="step-indicator font-semibold" style="color: #10b981">Step 1 of 3</div>

                                 <!--ENDPROGRESS BAR CSS-->


                                 <div class="step" data-step="1">
                                     <h3
                                         class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                                         Información</h3>
                                     <div class="mb-5">
                                         <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                             Título
                                         </label>
                                         <input type="text" required placeholder="Ingresa un Título"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                             id="title" name="title" value="{{ $collections->title }}" />
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
                                         <textarea name="description" required id="description" rows="5"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $collections->description }}</textarea>
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
                                                     <option value="{{ $collections->property_type }}">
                                                         {{ $collections->property_description }}
                                                     </option>
                                                     @foreach ($propertyTypesRender as $item)
                                                         <option value="{{ $item->id }}">
                                                             {{ $item->property_description }}
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
                                                     <option value=" {{ $collections->transaction_type }}">
                                                         {{ $collections->transaction_description }}</option>
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
                                                     placeholder="Location" value="{{ $collections->location }}"
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
                                                     placeholder="Ciudad" value="{{ $collections->city }}"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                                 @error('city')
                                                     <span class="text-red-500">{{ $message }}</span>
                                                 @enderror

                                                 <input type="hidden" id="latitudeArea" name="latitudeArea"
                                                     value="{{ $collections->latitudeArea }}"
                                                     class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                                                 <input type="hidden" id="longitudeArea" name="longitudeArea"
                                                     value="{{ $collections->longitudeArea }}"
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
                                                     value="{{ $collections->bedrooms }}"
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
                                                     id="bathrooms" name="bathrooms"
                                                     value="{{ $collections->bathrooms }}" />
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
                                             @error('features.0')
                                                 <span class="text-red-500">{{ $message }}</span>
                                             @enderror
                                             <div>
                                                 <button type="button" name="add2" id="add2"
                                                     class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out">Add
                                                 </button>
                                             </div>
                                         </div>

                                         @foreach ($features as $feature)
                                             <div class="flex items-center mb-5">
                                                 <input type="hidden" name="feature_ids[]" value="{{ $feature->id }}">
                                                 <input type="text" name="addmore2[]"
                                                     placeholder="Agregar Característica"
                                                     value="{{ $feature->feature_description }}"
                                                     id="feature_input_{{ $feature->id }}"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" />
                                                 <button type="button" onclick="deleteFeature({{ $feature->id }})"
                                                     class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out "
                                                     data-feature-id="{{ $feature->id }}">
                                                     <i class="fa-solid fa-trash-can"></i>
                                                 </button>
                                             </div>
                                         @endforeach

                                         <script type="text/javascript">
                                             var i = {{ count($features) }};

                                             $("#add2").click(function() {
                                                 ++i;
                                                 $("#dynamicTable2").append(
                                                     '<div class="flex items-center mb-5"><input type="text" name="addmore2[]" placeholder="Agregar Característica" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" /><button type="button" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out remove-tr2"><i class="fa-solid fa-trash-can"></i></button></div>'
                                                 );
                                             });

                                             $(document).on('click', '.remove-tr2', function() {
                                                 $(this).closest('div').remove();
                                             });
                                         </script>

                                         <script>
                                             function deleteFeature(featureId) {
                                                 Swal.fire({
                                                     title: 'Are you sure?',
                                                     text: "You won't be able to revert this!",
                                                     icon: 'warning',
                                                     showCancelButton: true,
                                                     confirmButtonColor: '#3085d6',
                                                     cancelButtonColor: '#d33',
                                                     confirmButtonText: 'Yes, delete it!'
                                                 }).then((result) => {
                                                     if (result.isConfirmed) {
                                                         // Envía la solicitud AJAX para eliminar la característica
                                                         $.ajax({
                                                             url: '/delete-feature/' + featureId,
                                                             type: 'DELETE',
                                                             headers: {
                                                                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                             },
                                                             success: function(response) {
                                                                 if (response.success) {
                                                                     Swal.fire(
                                                                         'Deleted!',
                                                                         'Your feature has been deleted.',
                                                                         'success'
                                                                     );

                                                                     // Elimina el div correspondiente a la característica eliminada
                                                                     $('#feature_input_' + featureId).closest('div').remove();
                                                                 } else {
                                                                     Swal.fire(
                                                                         'Error!',
                                                                         response.message,
                                                                         'error'
                                                                     );
                                                                 }
                                                             },
                                                             error: function(xhr, status, error) {
                                                                 Swal.fire(
                                                                     'Error!',
                                                                     'An error occurred while deleting the feature.',
                                                                     'error'
                                                                 );
                                                             }
                                                         });
                                                     }
                                                 });
                                             }
                                         </script>
                                     </div>



                                     <div class="mb-5">
                                         <label for="propertyType"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Características adicionales (Opcional)
                                         </label>
                                         <textarea name="additional_features" id="additional_features"
                                             placeholder="Cualquier característica adicional relevante, como piscina, jardín, garaje, etc... que desees informar a los visitantes"
                                             rows="5"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $collections->additional_features }}</textarea>
                                         @error('additional_features')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>

                                     <div class="mb-10" id="dynamicTable">
                                         <label for="propertyType"
                                             class="mb-3 block capitalize text-base font-medium text-[#07074D]">
                                             Equipamiento
                                         </label>

                                         <div class="flex items-center mb-5">

                                             @error('equipments.0')
                                                 <span class="text-red-500">{{ $message }}</span>
                                             @enderror
                                             <div>
                                                 <button type="button" name="add" id="add"
                                                     class="bg-green-600 hover:bg-green-400 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out">Add
                                                 </button>
                                             </div>
                                         </div>


                                         @foreach ($equipments as $equipment)
                                             <div class="flex items-center mb-5">
                                                 <input type="hidden" name="equipment_ids[]"
                                                     value="{{ $equipment->id }}">
                                                 <input type="text" name="addmore[]" placeholder="Agregar Equipo"
                                                     value="{{ $equipment->equipment_description }}"
                                                     id="equipment_input_{{ $equipment->id }}"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" />
                                                 <button type="button" onclick="deleteEquipment({{ $equipment->id }})"
                                                     class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out "
                                                     data-equipment-id="{{ $equipment->id }}">
                                                     <i class="fa-solid fa-trash-can"></i>
                                                 </button>
                                             </div>
                                         @endforeach

                                         <script type="text/javascript">
                                             var i = {{ count($equipments) }};

                                             $("#add").click(function() {
                                                 ++i;
                                                 $("#dynamicTable").append(
                                                     '<div class="flex items-center mb-5"><input type="text" name="addmore[]" placeholder="Agregar Equipo" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md flex-grow mr-4" /><button type="button" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-500 ease-in-out remove-tr"><i class="fa-solid fa-trash-can"></i></button></div>'
                                                 );
                                             });

                                             $(document).on('click', '.remove-tr', function() {
                                                 $(this).closest('div').remove();
                                             });
                                         </script>

                                         <script>
                                             function deleteEquipment(equipmentId) {
                                                 Swal.fire({
                                                     title: 'Are you sure?',
                                                     text: "You won't be able to revert this!",
                                                     icon: 'warning',
                                                     showCancelButton: true,
                                                     confirmButtonColor: '#3085d6',
                                                     cancelButtonColor: '#d33',
                                                     confirmButtonText: 'Yes, delete it!'
                                                 }).then((result) => {
                                                     if (result.isConfirmed) {
                                                         // Envía la solicitud AJAX para eliminar la característica
                                                         $.ajax({
                                                             url: '/delete-equipment/' + equipmentId,
                                                             type: 'DELETE',
                                                             headers: {
                                                                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                             },
                                                             success: function(response) {
                                                                 if (response.success) {
                                                                     Swal.fire(
                                                                         'Deleted!',
                                                                         'Your equipment has been deleted.',
                                                                         'success'
                                                                     );

                                                                     // Elimina el div correspondiente a la característica eliminada
                                                                     $('#equipment_input_' + equipmentId).closest('div').remove();
                                                                 } else {
                                                                     Swal.fire(
                                                                         'Error!',
                                                                         response.message,
                                                                         'error'
                                                                     );
                                                                 }
                                                             },
                                                             error: function(xhr, status, error) {
                                                                 Swal.fire(
                                                                     'Error!',
                                                                     'An error occurred while deleting the feature.',
                                                                     'error'
                                                                 );
                                                             }
                                                         });
                                                     }
                                                 });
                                             }
                                         </script>

                                     </div>


                                     <div class="-mx-3 flex flex-wrap">
                                         <div class="w-full px-3 sm:w-1/4">
                                             <div class="mb-7">
                                                 <label for="transaction_type"
                                                     class="mb-3 block text-base font-medium text-[#07074D]">
                                                     Total Area Por M²
                                                 </label>
                                                 <input type="number" placeholder="Total Area" id="total_area"
                                                     name="total_area" value="{{ $collections->total_area }}"
                                                     class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                                 @error('total_area')
                                                     <span class="text-red-500">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                         </div>
                                         <div class="w-full px-3 sm:w-1/4">
                                             <div class="mb-7">
                                                 <label for="propertyType"
                                                     class="mb-3 block text-base font-medium text-[#07074D]">
                                                     Certificado energético
                                                 </label>
                                                 <select name="energy_certificate" id="energy_certificate"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                     <option value=" {{ $collections->energy_certificate }}">
                                                         {{ $collections->energy_certificate }}</option>
                                                     @for ($i = 65; $i <= 71; $i++)
                                                         <option value="{{ chr($i) }}">{{ chr($i) }}
                                                         </option>
                                                     @endfor
                                                     <option value="En Trámite">En Trámite</option>
                                                 </select>
                                                 @error('energy_certificate')
                                                     <span class="text-red-500">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                         </div>

                                         <div class="w-full px-3 sm:w-1/4">
                                             <div class="mb-7">
                                                 <label for="garage"
                                                     class="mb-3 block text-base font-medium text-[#07074D]">
                                                     Garaje
                                                 </label>
                                                 <select name="garage" id="garage"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                     <option value="{{ $collections->garage }}">
                                                         {{ $collections->garage }}</option>
                                                     <option value="Garaje Incluido">Incluido</option>
                                                     <option value="Garaje No Incluido">No Incluido</option>

                                                 </select>
                                                 @error('garage')
                                                     <span class="text-red-500">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                         </div>

                                         <div class="w-full px-3 sm:w-1/4">
                                             <div class="mb-7">
                                                 <label for="garage"
                                                     class="mb-3 block text-base font-medium text-[#07074D]">
                                                     Estatus
                                                 </label>
                                                 <select name="status" id="status"
                                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                     <option value="{{ $collections->status }}">
                                                         {{ $collections->estatus_description }}</option>
                                                     @foreach ($estatusAdsRender as $item)
                                                         <option value="{{ $item->id }}">
                                                             {{ $item->estatus_description }}</option>
                                                     @endforeach
                                                 </select>
                                                 @error('status')
                                                     <span class="text-red-500">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                         </div>
                                     </div>

                                     <div class="mb-5">
                                         <label for="propertyType"
                                             class="mb-3 block text-base font-medium text-[#07074D]">
                                             Precio
                                         </label>
                                         <input type="text" placeholder="Ingrese Precio Total"
                                             value="{{ $collections->price }}"
                                             class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                             id="price" name="price" />
                                         @error('price')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>

                                     <!-- Add more fields for Step 2 if needed -->
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

                     // Recargar la página después de 2 segundos
                     setTimeout(function() {
                         location.reload();
                     }, 1000);

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
                     status: "required",
                     energy_certificate: "required",
                     price: {
                         required: true,
                         minlength: 3,
                         digits: true // Asegura que solo acepte dígitos

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
     </x-app-layout>
 @endauth
 <!-- END AUTH USER -->
