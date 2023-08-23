 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 Imágenes Anuncio / {{ $publishCodeImages }}
             </x-slot>

         </x-slot>



         <div class="py-12 mb-20">
             <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">
                     <h1 class="text-center mb-5 text-green-600 font-semibold text-2xl"> Galeria de Imágenes Cargadas</h1>
                     <div id="remainingImagesDiv">
                         @if ($remainingImages > 0)
                             <h1 class="text-center text-fuchsia-700 font-semibold text-2xl">
                                 Plan {{ $purchasedPlan->plan }} - Imágenes Disponibles Para Cargar {{ $remainingImages }}
                             </h1>
                         @else
                             <h1 class="text-center text-fuchsia-700 font-semibold text-2xl">
                                 Plan {{ $purchasedPlan->plan }}
                             </h1>
                         @endif
                     </div>

                     <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>




                     <div id="imageContainer" class="  grid gap-4 my-10">
                         <div class="grid grid-cols-3 md:grid-cols-5 gap-4 sortable-container ">
                             @foreach ($images as $image)
                                 <figure class="relative ">
                                     <div>

                                         <img class="h-auto w-full rounded-lg object-cover"
                                             src="{{ Storage::url($image->image_path) }}" alt="image description"
                                             id="image_{{ $image->id }}">

                                     </div>
                                     <label for="checkbox_{{ $image->id }}"
                                         class="absolute top-0 right-0  mr-0 checkbox-container">
                                         <input type="checkbox" id="checkbox_{{ $image->id }}"
                                             class="hidden checkbox-image" data-image-id="{{ $image->id }}">
                                         <span class="checkmark"></span>
                                     </label>
                                     <!-- Ícono de "ojo" -->
                                     <button
                                         class="text-xs absolute top-0 left-0 z-50 p-1 flex items-center bg-white rounded-br focus:outline-none"
                                         type="button">
                                         <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                             viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                             <path
                                                 d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                         </svg>
                                         <span class="ml-1 font-semibold text-gray-700">{{ $image->order_display }}</span>
                                     </button>
                                 </figure>
                             @endforeach
                         </div>
                     </div>





                     <div class="flex flex-wrap justify-center">
                         <button id="deleteSelectedImages" class="px-4 py-2 mb-10 bg-red-600 text-white rounded"
                             onclick="deleteSelectedImages()"> <i class="fa-solid fa-trash-can mr-1"></i>
                             Eliminar</button>



                     </div>



                     <form action="{{ route('add.images', $publishCodeImages) }}" method="POST"
                         enctype="multipart/form-data" id="wizardForm">
                         @csrf
                         <input type="hidden" name="publishCodeImages" value="{{ $publishCodeImages }}" />



                         <div class="dropzone sortable">
                             <div class="dz-message needsclick">
                                 <span class="text font-semibold">
                                     <img src="http://www.freeiconspng.com/uploads/------------------------------iconpngm--22.png"
                                         alt="Camera" />
                                     Drop files here or click to upload.
                                 </span>
                                 <span class="plus ">+</span>
                             </div>
                             <div class="dz-previews ">
                             </div>
                         </div>

                         <div class="flex justify-center">
                             <button type="submit" id="submitBtn"
                                 class="my-10 px-6 py-3 capitalize rounded-md bg-green-700 text-white font-medium duration-500 ease-in-out hover:bg-green-400">Guardar</button>
                         </div>

                         <!-- END IMAGES LOADER -->


                     </form>



                 </div>
             </div>
         </div>
     </x-app-layout>


     <!--FANCYBOX -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
     <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

     <script>
         Fancybox.bind('[data-fancybox="gallery"]', {
             //
         });
     </script>
     <!--END FANCYBOX -->


     <!--INCLUDE ALERTS MESSAGES-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <x-message-success />
     <!-- END INCLUDE ALERTS MESSAGES-->


     <style>
         /* Estilos básicos para el checkbox */
         .checkbox-container {
             position: absolute;
             top: 8px;
             right: 8px;
             cursor: pointer;
             width: 15px;
             height: 15px;
             border: 1px solid #bd1515;
             border-radius: 3px;
             background-color: #fff;
         }

         /* Estilos para el checkbox marcado (la "X") */
         .checkbox-container input[type="checkbox"]:checked+.checkmark {
             position: absolute;
             top: 0;
             left: 0;
             width: 100%;
             height: 100%;
             background-color: #fff;
             border-radius: 3px;
             display: flex;
             justify-content: center;
             align-items: center;
             color: #c90303;
             font-size: 14px;
         }

         /* Estilos para el ícono "X" */
         .checkbox-container input[type="checkbox"]:checked+.checkmark::before {
             content: "X";
         }

         /* Estilos para el botón de "Eliminar" */
         #deleteSelectedImages {
             display: none;
         }


         /*  IMAGE GALLERY
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ----------------------*/

         .owl-next.disabled,
         .owl-prev.disabled {
             opacity: 0.5;

         }

         .owl-prev,
         .owl-next {
             position: absolute;
             top: 50%;
             transform: translateY(-50%);

         }

         .owl-prev {
             left: 0;

         }

         .owl-next {
             right: 0;
         }

         .owl-theme .owl-nav.disabled+.owl-dots {
             margin-top: 60px;
         }

         .owl-theme .owl-dots .owl-dot span {
             background: #e7d9eb;
             width: 35px;
             height: 8px;
             border-radius: 10px;
             transition: all 0.3s ease-in;
         }

         .owl-theme .owl-dots .owl-dot:hover span {
             background: #2240F4;
         }

         .owl-theme .owl-dots .owl-dot.active span {
             background: #2240F4;
             box-shadow: 0px 9px 32px 0px rgba(0, 0, 0, 0.07);
         }

         .img-gallery .owl-item {
             box-shadow: 0px 9px 32px 0px rgba(0, 0, 0, 0.07);
             transform: scale(0.8);
             transition: all 0.3s ease-in;
         }

         .img-gallery .owl-item.center {
             transform: scale(1);
         }
     </style>

     <!-- IMAGES LOADER -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
     <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
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

     <script>
         $(document).ready(function() {
             var publishCodeImages = '{{ $publishCodeImages }}';
             var images = '{{ $images }}';
             var dz = new Dropzone(".dropzone", {
                 //autoProcessQueue: false,
                 paramName: "images",
                 url: "/add-images-gallery/" + publishCodeImages, // Corrección en la URL
                 previewThumbnails: true,
                 sortable: true,
                 autoProcessQueue: false,
                 addRemoveLinks: true,
                 acceptedFiles: 'image/*',
                 maxFiles: '{{ $remainingImages }}',
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
             dz.on("queuecomplete", function() {
                 $.ajax({
                     url: "/images-gallery/" +
                         publishCodeImages, // Cambia esto a la URL correcta que devuelva las imágenes actualizadas
                     method: "GET",
                     dataType: "html",
                     headers: {
                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                     },
                     success: function(data) {

                     },
                     error: function(error) {
                         console.error("Error al cargar las imágenes actualizadas:", error);
                     }
                 });
             });
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
             dz.on("removedfile", function(file) {
                 var fileName = file.name;
                 var index = uploadedFileNames.indexOf(fileName);
                 if (index > -1) {
                     uploadedFileNames.splice(index, 1);
                 }
             });
             dz.on("sending", function(file, xhr, formData) {
                 formData.append('orderDisplay', orderCounter);
                 formData.append('publishCodeImages', publishCodeImages);
                 formData.append('images', images);
             });
         });
     </script>

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             const sortableContainer = document.querySelector('.sortable-container');

             new Sortable(sortableContainer, {
                 animation: 150, // Animation speed in milliseconds
                 ghostClass: 'ghost', // Class applied to the dragged item
                 chosenClass: 'chosen', // Class applied to the chosen item
                 onUpdate: function(event) {
                     const images = sortableContainer.querySelectorAll('figure');

                     images.forEach((image, index) => {
                         const imageId = image.querySelector('.checkbox-image').getAttribute(
                             'data-image-id');
                         const positionButton = image.querySelector('.text-xs');
                         const positionText = positionButton.querySelector('.font-semibold');
                         const orderData = [];

                         // Update the position in the button text
                         positionText.textContent = index + 1;
                         console.log(`Image ID: ${imageId}, New Position: ${index + 1}`);


                         // Agrega los datos al array orderData
                         orderData.push({
                             imageId: imageId,
                             newPosition: index + 1
                         });

                         console.log('orderData:',
                             orderData); // Mostrar el arreglo en la consola

                         // Envía la solicitud Ajax
                         const formData = new FormData();
                         formData.append('orderData', JSON.stringify(orderData)); // Cambio aquí
                         formData.append('_token', '{{ csrf_token() }}');
                         formData.append('imageId', imageId);
                         formData.append('newPosition', index + 1);



                         fetch('/update-image-order', {
                                 method: 'POST',
                                 body: formData,
                                 headers: {
                                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                 },

                             })

                             .then(response => response.json())
                             .then(data => {
                                 console.log('Solicitud enviada y respuesta del servidor:',
                                     data);
                             })
                             .catch(error => {
                                 console.error('Error:', error);
                             });

                     });




                 },
             });
         });
     </script>

     <script>
         function deleteSelectedImages() {
             const selectedImageIds = Array.from(document.querySelectorAll('.checkbox-image:checked'))
                 .map(checkbox => checkbox.getAttribute('data-image-id'));

             if (selectedImageIds.length === 0) {
                 Swal.fire('¡Error!', 'Por favor, seleccione al menos una imagen para eliminar.', 'error');
                 return;
             }

             Swal.fire({
                 title: 'Eliminar imágenes',
                 text: '¿Estás seguro de que quieres eliminar las imágenes seleccionadas?',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Eliminar',
                 cancelButtonText: 'Cancelar'
             }).then((result) => {
                 if (result.isConfirmed) {
                     // Realiza una solicitud AJAX para eliminar las imágenes seleccionadas
                     axios.post('/delete-images', {
                             imageIds: selectedImageIds
                         })
                         .then((response) => {
                             if (response.data.success) {
                                 Swal.fire('Éxito', 'Las imágenes han sido eliminadas exitosamente', 'success')
                                     .then(() => {
                                         const publishCodeImages = '{{ $publishCodeImages }}';
                                         const deleteButton = document.getElementById(
                                             'deleteSelectedImages');
                                         deleteButton.style.display =
                                             'none'; // Oculta el botón "Eliminar" después de confirmar

                                         window.location.href = '/images-gallery/' +
                                             publishCodeImages; // Redirige a la URL adecuada
                                     });
                             } else {
                                 Swal.fire('¡Error!', 'Ha ocurrido un problema al eliminar las imágenes.',
                                     'error');
                             }
                         })
                         .catch((error) => {
                             console.error(error);
                             Swal.fire('¡Error!', 'Ha ocurrido un problema al eliminar las imágenes.', 'error');
                         });
                 }
             });
         }

         const deleteButton = document.getElementById('deleteSelectedImages');
         const checkboxes = document.querySelectorAll('input[type="checkbox"]');

         checkboxes.forEach(checkbox => {
             checkbox.addEventListener('change', () => {
                 const anyCheckboxChecked = Array.from(checkboxes).some(cb => cb.checked);
                 deleteButton.style.display = anyCheckboxChecked ? 'block' : 'none';
             });
         });

         deleteButton.addEventListener('click', deleteSelectedImages);
     </script>

 @endauth
 <!-- END AUTH USER -->
