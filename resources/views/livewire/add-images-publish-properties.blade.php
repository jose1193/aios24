 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 Imagenes Anuncio / {{ $publishCodeImages }}
             </x-slot>

         </x-slot>



         <div class="py-12 mb-20">
             <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">
                     <h1 class="text-center mb-5 text-green-600 font-semibold text-2xl"> Galeria de Imagenes Cargadas</h1>
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

                     <div class="grid gap-4 my-10">
                         <div class="grid grid-cols-3 md:grid-cols-5 gap-4">
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
                             onclick="deleteSelectedImages()"> <i class="fa-solid fa-trash-can mr-1"></i> Eliminar</button>


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



                     </div>
                     <form action="{{ route('add.images', $publishCodeImages) }}" method="POST"
                         enctype="multipart/form-data">
                         @csrf
                         <input type="hidden" name="publishCodeImages" value="{{ $publishCodeImages }}" />

                         <div x-data="dataFileDnD()"
                             class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                             <div x-ref="dnd"
                                 class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                 <input accept="image/*" type="file" name="images[]" id="images" required multiple
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
                                     <p class="m-0">Arrastra tus archivos aquí o haz clic en esta área.</p>
                                 </div>
                             </div>

                             <template x-if="files.length > 0">
                                 <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                                     @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                     <template x-for="(file, index) in files">
                                         <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                             style="padding-top: 100%;" @dragstart="dragstart($event)"
                                             @dragend="fileDragging = null"
                                             :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                                             :data-index="index">
                                             <button
                                                 class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                 type="button" @click="remove(index)">
                                                 <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                 </svg>
                                             </button>
                                             <template x-if="file.type.includes('audio/')">
                                                 <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                 </svg>
                                             </template>
                                             <template x-if="file.type.includes('application/') || file.type === ''">
                                                 <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round"
                                                         stroke-width="2"
                                                         d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                 </svg>
                                             </template>
                                             <template x-if="file.type.includes('image/')">
                                                 <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                     :src="loadFile(file)" />
                                             </template>
                                             <template x-if="file.type.includes('video/')">
                                                 <video
                                                     class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                     <source :src="loadFile(file)" type="video/mp4">
                                                 </video>
                                             </template>

                                             <div
                                                 class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                 <span class="w-full font-bold text-gray-900 truncate"
                                                     x-text="file.name">Cargando</span>
                                                 <span class="text-xs text-gray-900"
                                                     x-text="humanFileSize(file.size)">...</span>
                                             </div>

                                             <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                 @dragenter="dragenter($event)" @dragleave="fileDragging = null"
                                                 :class="{
                                                     'bg-blue-200 bg-opacity-80': fileDragging == index && file.type
                                                         .includes('image/')
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

                         <div class="flex justify-center">
                             <button type="submit"
                                 class="my-10 px-6 py-3 capitalize rounded-md bg-green-700 text-white font-medium duration-500 ease-in-out hover:bg-green-400">Guardar</button>
                         </div>
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
     <!-- START MULTIPLE FILE ALPINE -->
     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
     <script src="https://unpkg.com/create-file-list"></script>
     <script>
         function dataFileDnD() {
             return {
                 maxFiles: 100,
                 files: [],
                 fileDragging: null,
                 fileDropping: null,
                 humanFileSize(size) {
                     const i = Math.floor(Math.log(size) / Math.log(1024));
                     return (
                         (size / Math.pow(1024, i))
                         .toFixed(2) * 1 +
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
                         alert("No se pueden agregar más de 100 imágenes.");
                     }
                 }
             };
         }
     </script>

     <!-- END MULTIPLE FILE ALPINE -->

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
 @endauth
 <!-- END AUTH USER -->
