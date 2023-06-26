 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 Agregar Imagenes Anuncio / {{ $publishCodeImages }}
             </x-slot>

         </x-slot>
         <!--INCLUDE ALERTS MESSAGES-->


         <x-message-success />
         <!-- END INCLUDE ALERTS MESSAGES-->

         <div class="py-12 mb-20">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">
                     <h1 class="text-center text-green-600 font-semibold text-xl"> Galeria de Imagenes Cargadas</h1>
                     <div class="flex justify-center ">

                         <div id="fancybox">

                             <div class="flex flex-wrap justify-center my-10">

                                 <div class="w-1/3 sm:w-4/12 lg:w-8/12 px-4">

                                     @if ($images->isNotEmpty())
                                         <a data-fancybox="gallery"
                                             class="rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                                             href="{{ Storage::url($images[0]->image_path) }}">
                                             <img src="{{ Storage::url($images[0]->image_path) }}" alt="Property Image">
                                         </a>
                                     @endif
                                 </div>
                             </div>
                             <div style="display:none">
                                 @foreach ($images as $image)
                                     @if ($loop->index !== 0)
                                         <a data-fancybox="gallery" href="{{ Storage::url($image->image_path) }}">
                                             <img src="{{ Storage::url($image->image_path) }}" alt="Property Image">
                                         </a>
                                     @endif
                                 @endforeach
                             </div>
                         </div>
                     </div>

                     <form action="{{ route('add.images', $publishCodeImages) }}" method="POST"
                         enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div x-data="dataFileDnD()"
                             class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                             <div x-ref="dnd"
                                 class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                 <input accept="*" type="file" name="images[]" id="images" required multiple
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
                                 <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
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
                                                 <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                 </svg>
                                             </button>
                                             <template x-if="files[index].type.includes('audio/')">
                                                 <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                 </svg>
                                             </template>
                                             <template
                                                 x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                 <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                                                     <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
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
                         <div class="flex justify-center">
                             <button id="submitBtn" type="submit"
                                 class="my-10 px-6 py-3 capitalize rounded-md bg-green-700 text-white font-medium duration-500 ease-in-out hover:bg-green-400">
                                 {{ __('Publicar Anuncio') }}
                             </button>
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
 @endauth
 <!-- END AUTH USER -->
