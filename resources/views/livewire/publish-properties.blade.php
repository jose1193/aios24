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
             <h1 class="text-center text-fuchsia-700 font-semibold text-2xl">
                 Plan {{ $planName }} - {{ $remainingAds }} Publicaciones Disponibles

             </h1>
             @if ($remainingAds <= 0)
                 <div class="w-1/2 mx-auto my-5 bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-yellow-900 px-4 py-3 shadow-md"
                     role="alert">
                     <div class="flex">
                         <div class="py-1"><svg class="fill-current h-6 w-6 text-yellow-500 mr-4"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path
                                     d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                             </svg></div>
                         <div>
                             <p class="font-bold">Warning</p>
                             <p class="text-sm">Has alcanzado el máximo de publicaciones para este plan.</p>
                         </div>
                     </div>
                 </div>
             @endif
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
                         <div class="step-indicator font-semibold" style="color: #10b981">Step 1 of 2</div>

                         <!--ENDPROGRESS BAR CSS-->


                         <div class="step" data-step="1">
                             <h3 class="mb-10 text-center text-green-600 lg:text-2xl sm:text-base font-bold capitalize">
                                 Información - Especificaciones</h3>
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

                             <div class="mb-7">
                                 <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Título
                                 </label>
                                 <input type="text" required placeholder="Ingresa un Título"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                     id="title" name="title" />

                                 <span id="title-error" class="text-red-500"></span>
                                 <!-- Agrega un espacio para el mensaje de error -->

                             </div>
                             <div class="my-5">
                                 <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Descripción
                                 </label>
                                 <textarea name="description" id="description" placeholder="Ingresa una Descripción" rows="8"
                                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                 @error('description')
                                     <span class="text-red-500">{{ $message }}</span>
                                 @enderror
                             </div>
                             <div class="-mx-3 flex flex-wrap mb-3 ">
                                 <div class="w-full px-3 sm:w-1/2">
                                     <div class="mb-5">
                                         <label for="bedrooms" class="mb-3 block text-base font-medium text-[#07074D]">
                                             Habitaciones
                                         </label>

                                         <select required name="bedrooms" id="bedrooms"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                             <option value="">Seleccione Cantidad de Dormitorios</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6+">6+</option>

                                         </select>
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
                                         <select required name="bathrooms" id="bathrooms"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                             <option value="">Seleccione Cantidad de Baños</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6+">6+</option>

                                         </select>


                                         @error('bathrooms')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                             </div>

                             <div class="mb-10" id="dynamicTable2">
                                 <label for="propertyType"
                                     class="mb-3 block capitalize text-base font-medium text-[#07074D]">
                                     Características básicas (Opcional)
                                 </label>

                                 <div class="flex items-center mb-5">
                                     <input type="text" name="addmore2[0][features]"
                                         placeholder="Ej: Amueblado y cocina equipada"
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

                             <div class="mb-10" id="dynamicTable">
                                 <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                     Equipamiento (Opcional)
                                 </label>

                                 <div class="flex items-center mb-5">
                                     <input type="text" name="addmore[0][equipments]"
                                         placeholder="Ej: Aire acondicionado"
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
                                             <option value="En Trámite"> En Trámite </option>
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


                             <div class="mb-7 ">
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

                             <div class="-mx-3 flex flex-wrap ">
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
                                         <input type="text" id="city" readonly name="city"
                                             placeholder="Ciudad"
                                             class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                         @error('city')
                                             <span class="text-red-500">{{ $message }}</span>
                                         @enderror

                                         <input type="hidden" id="latitudeArea" name="latitudeArea"
                                             class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                                         <input type="hidden" id="longitudeArea" name="longitudeArea"
                                             class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                         <input type="hidden" id="publishCode" name="publishCode"
                                             value="{{ $publishCode }}">
                                     </div>

                                 </div>
                             </div>



                         </div>

                         <div class="step" data-step="2">
                             <h3 class="mb-5 text-center text-green-600 lg:text-xl sm:text-base font-bold capitalize">
                                 Finalizar Registro
                             </h3>


                             <!-- IMAGES LOADER -->
                             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                             <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
                             <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet"
                                 type="text/css" />
                             <style>
                                 .dropzone {
                                     width: 98%;
                                     margin: 1%;
                                     border: 2px dashed #16a34a !important;
                                     border-radius: 5px;
                                     transition: 0.2s;
                                 }

                                 .dropzone.dz-drag-hover {
                                     border: 2px solid #16a34a !important;
                                 }

                                 .dz-message.needsclick img {
                                     width: 50px;
                                     display: block;
                                     margin: auto;
                                     opacity: 0.6;
                                     margin-bottom: 15px;
                                 }

                                 span.plus {
                                     display: none;
                                 }

                                 .dropzone.dz-started .dz-message {
                                     display: inline-block !important;
                                     width: 120px;
                                     float: right;
                                     border: 1px solid rgba(238, 238, 238, 0.36);
                                     border-radius: 30px;
                                     height: 120px;
                                     margin: 16px;
                                     transition: 0.2s;
                                 }

                                 .dropzone.dz-started .dz-message span.text {
                                     display: none;
                                 }

                                 .dropzone.dz-started .dz-message span.plus {
                                     display: block;
                                     font-size: 70px;
                                     color: #AAA;
                                     line-height: 110px;
                                 }

                                 .dz-success-mark {
                                     background-color: rgb(102, 187, 106, .8) !important;
                                 }

                                 .dz-success-mark svg {
                                     font-size: 54px;
                                     fill: #fff !important;
                                 }

                                 .dz-error-mark {
                                     background-color: rgba(239, 83, 80, .8) !important;
                                 }

                                 .dz-error-mark svg {
                                     font-size: 54px;
                                     fill: #fff !important;
                                 }
                             </style>

                             <!-- Add this to your HTML header -->

                             <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

                             <!-- Sortable JS -->
                             <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

                             <div class="dropzone sortable">
                                 <div class="dz-message needsclick">
                                     <span class="text font-semibold">
                                         <img src="http://www.freeiconspng.com/uploads/------------------------------iconpngm--22.png"
                                             alt="Camera" />
                                         Drop files here or click to upload.
                                     </span>
                                     <span class="plus ">+</span>
                                 </div>
                                 <div class="dz-previews">
                                 </div>
                             </div>

                             <script>
                                 Dropzone.autoDiscover = false;
                                 $(".sortable").sortable({

                                     change: function(event, ui) {

                                         ui.placeholder.css({
                                             visibility: 'visible',
                                             border: '2px dashed#16a34a',
                                             borderRadius: '10px',
                                             height: '120px',

                                         });

                                     }

                                 });
                                 $(document).ready(function() {
                                     var publishCode = '{{ $publishCode }}';
                                     var images = '{{ $images }}';
                                     var dz = new Dropzone(".dropzone", {
                                         autoProcessQueue: false,
                                         paramName: "images",
                                         url: "/uploadFiles",
                                         previewThumbnails: true,
                                         sortable: true,

                                         addRemoveLinks: true,
                                         acceptedFiles: 'image/*',
                                         maxFiles: '{{ $maxImages }}',
                                         maxFilesize: 1,
                                         headers: {
                                             'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                         },
                                     });


                                     $("#submitBtn").on("click", function(event) {
                                         event.preventDefault();

                                         // Verifica si hay archivos en la cola de Dropzone
                                         if (dz.getQueuedFiles().length > 0) {

                                             dz.processQueue();

                                             dz.on("queuecomplete", function() {

                                                 var form = $("#wizardForm");
                                                 form.submit();
                                             });
                                         } else {

                                             alert("Debes cargar al menos una imagen antes de enviar el formulario.");
                                         }
                                     });

                                     var uploadedFileNames = [];
                                     var orderCounter = 1;

                                     dz.on("thumbnail", function(file, dataUrl) {
                                         var fileName = file.name;
                                         if (uploadedFileNames.includes(fileName)) {
                                             alert("Esta imagen ya ha sido cargada.");
                                             dz.removeFile(file);
                                             return;
                                         }

                                         if (dz.files.length > dz.options.maxFiles) {
                                             dz.removeFile(file);
                                             alert("Límite máximo de archivos alcanzado.");
                                             return;
                                         }

                                         uploadedFileNames.push(fileName);

                                         var viewButton = document.createElement('button');
                                         viewButton.className = '';
                                         file.previewElement.appendChild(viewButton);

                                         $(viewButton).on("click", function() {
                                             // Agrega aquí el código para mostrar la imagen en un visor modal o alguna otra acción de visualización
                                         });

                                         $(file.previewElement).find("img").attr("src", dataUrl);

                                         orderCounter++; // Incrementa el contador
                                     });
                                     dz.on("removedfile", function(file) {
                                         var fileName = file.name;
                                         var index = uploadedFileNames.indexOf(fileName);
                                         if (index > -1) {
                                             uploadedFileNames.splice(index, 1);
                                         }
                                     });
                                     dz.on("addedfile", function(file) {
                                         var removeButton = file.previewElement.querySelector(".dz-remove");
                                         removeButton.classList =
                                             "dz-remove-btn absolute top-0 right-0 z-50 p-1 flex items-center bg-white rounded-bl focus:outline-none";
                                         removeButton.innerHTML = '<i class="text-sm text-red-600 fa-solid fa-trash-can"></i>';

                                         // Verifica el tamaño del archivo
                                         if (file.size > (1024 * 1024)) {
                                             alert("La imagen es mayor a 1 MB. Por favor, elige una imagen más pequeña.");
                                             dz.removeFile(file); // Elimina el archivo
                                         }
                                     });

                                     dz.on("sending", function(file, xhr, formData) {
                                         formData.append('orderDisplay', orderCounter);
                                         formData.append('publishCode', publishCode);
                                     });
                                 });
                             </script>






                             <!-- END IMAGES LOADER -->


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
                                     class="px-6 py-3 capitalize rounded-md bg-green-700 text-white font-medium duration-500 ease-in-out hover:bg-green-400"
                                     @if ($remainingAds <= 0) disabled @endif>
                                     {{ __('Publicar Anuncio') }}
                                 </button>


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
 @push('js')
     <script>
         const progressBar = document.querySelector('.progress-bar .progress');
         const nextButton = document.querySelector('#nextBtn');
         const prevButton = document.querySelector('#prevBtn');
         const stepIndicator = document.querySelector('.step-indicator');
         const totalSteps = 2;
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
             var titleInput = $("#title");
             var titleError = $("#title-error");

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
             // Agregar el evento "keyup" al campo de título
             titleInput.on("keyup", function() {
                 var title = $(this).val();

                 $.ajax({
                     type: 'POST',
                     url: '/check-title',
                     data: {
                         title: title,
                         _token: '{{ csrf_token() }}'
                     },
                     success: function(response) {
                         titleError.text(''); // Limpia el mensaje de error

                         enableNextButton();
                     },
                     error: function(xhr) {
                         if (xhr.status === 422) {
                             var errors = xhr.responseJSON.errors;
                             titleError.text(errors.title[0]); // Muestra el mensaje de error

                             if (errors.title[0] === 'The title has already been taken.') {

                                 disableNextButton();
                             } else {
                                 titleError.text(
                                     ''
                                 ); // Limpia el mensaje de error si no es el mensaje esperado

                                 enableNextButton();
                             }
                         }
                     }
                 });
             });

             function enableNextButton() {
                 nextBtn.removeAttr("disabled");
             }

             function disableNextButton() {
                 nextBtn.attr("disabled", true);
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
                     // Verificar si el campo tiene el atributo "name" con las cadenas "addmore" o "addmore2"
                     var name = input.attr("name");
                     if (!name.includes("addmore2") && !name.includes("addmore")) {
                         if (input.val().trim() === "") {
                             isValid = false;
                             input.addClass("invalid");
                         } else {
                             input.removeClass("invalid");
                             input.addClass("valid");
                         }
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
     <!-- END FORM WIZARD   -->

     <!-- START JQUERY VALIDATE  -->

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
                 description: "required",
                 garage: "required",
                 images: "required",
                 city: "required",
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
                 maxFiles: 10,
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
 @endpush
 <!-- TINY DESCRIPTION
         <script src="https://cdn.tiny.cloud/1/ledg98ovyfojczv2t6zjn48qwwczcqqth3g8ofwis9tuxh5t/tinymce/6/tinymce.min.js"
             referrerpolicy="origin"></script>

         <script>
             tinymce.init({
                 selector: 'textarea#description',
                 plugins: 'advlist autolink lists link image charmap print preview anchor',
                 toolbar: 'bold italic alignleft aligncenter alignright bullist numlist outdent indent',
                 menubar: false,
             });
         </script>
        END TINY DESCRIPTION -->
 <!-- Incluye la librería SweetAlert -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Incluye Axios -->
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

 <script>
     // Espera a que el DOM esté listo
     document.addEventListener("DOMContentLoaded", function() {
         // Obtén el valor de $remainingAds desde tu backend (supongamos que se define en el script PHP en la página)
         var remainingAds = <?php echo $remainingAds; ?>;

         // Verifica si el valor es menor o igual a 0
         if (remainingAds <= 0) {
             // Muestra el alert al cargar la página
             Swal.fire({
                 icon: 'warning',
                 text: 'Has alcanzado el máximo de publicaciones para este plan.',
                 showConfirmButton: true,
             })
         }
     });
 </script>
