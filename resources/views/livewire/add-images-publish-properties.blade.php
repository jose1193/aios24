 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 Agregar Imagenes Anuncio / {{ $publishCodeImages }}
             </x-slot>

         </x-slot>



         <div class="py-12 mb-20">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                     <div class="flex justify-center ">
                         <div
                             class="bg-white owl-carousel testimonials  p-10 grid w-full grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                             @foreach ($images as $image)
                                 <div class="p-3">
                                     <figure class="max-w-lg relative ">
                                         <img class="h-auto max-w-full rounded-lg"
                                             src="{{ Storage::url($image->image_path) }}" alt="image description"
                                             id="image_{{ $image->id }}">
                                         <button class="absolute top-2 right-2 rounded-full bg-red-600"
                                             data-image-id="{{ $image->id }}" onclick="deleteImage({{ $image->id }})">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                 <path fill-rule="evenodd"
                                                     d="M10 1a9 9 0 1 0 0 18A9 9 0 0 0 10 1zm4.95 13.637l-1.414 1.414L10 11.414l-3.536 3.637-1.414-1.414L8.586 10 5.05 6.363l1.414-1.414L10 8.586l3.536-3.637 1.414 1.414L11.414 10l3.536 3.637z"
                                                     clip-rule="evenodd" />
                                             </svg>
                                         </button>
                                     </figure>
                                 </div>
                             @endforeach

                         </div>

                         <script>
                             function deleteImage(imageId) {
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
                                         // Envía la solicitud AJAX para eliminar la imagen
                                         $.ajax({
                                             url: '/delete-image/' + imageId,
                                             type: 'DELETE',
                                             headers: {
                                                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                             },
                                             success: function(response) {
                                                 if (response.success) {
                                                     Swal.fire(
                                                         'Deleted!',
                                                         'The image has been deleted.',
                                                         'success'
                                                     );

                                                     // Elimina el contenedor de la imagen eliminada
                                                     $('#image_' + imageId).closest('figure').remove();
                                                     // Actualiza el contenido del div
                                                     $('#remainingImagesDiv').load(location.href + ' #remainingImagesDiv');
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
                                                     'An error occurred while deleting the image.',
                                                     'error'
                                                 );
                                             }
                                         });
                                     }
                                 });
                             }
                         </script>

                         <!-- END OWL CAROUSEL -->






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
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
