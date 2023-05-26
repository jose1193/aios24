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

             <x-message-success />


             <!-- END INCLUDE ALERTS MESSAGES-->


             <!--PUBLISH PROPERTY-->
             <div class="flex items-center justify-center p-12">

                 <div class="mx-auto w-full max-w-[700px] bg-white">
                     <form wire:submit.prevent="saveProperty" enctype="multipart/form-data">
                         <div class="mb-5">
                             <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                 Título
                             </label>
                             <input type="text" placeholder="Ingresa un Título"
                                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                 id="title" wire:model="title" />
                             @error('title')
                                 <span>{{ $message }}</span>
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
                                         <option value="Casa">Casa</option>
                                         <option value="Departamento">Departamento</option>
                                     </select>
                                     @error('property_type')
                                         <span>{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="w-full px-3 sm:w-1/2">
                                 <div class="mb-5">
                                     <label for="transaction_type"
                                         class="mb-3 block text-base font-medium text-[#07074D]">
                                         Transacción Tipo
                                     </label>
                                     <select name="transaction_type" wire:model="transaction_type" id="transaction_type"
                                         class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                         <option value=""></option>
                                         <option value="active">Venta</option>
                                         <option value="inactive">Alquiler</option>
                                     </select>
                                     @error('transaction_type')
                                         <span>{{ $message }}</span>
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
                                 <span>{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="-mx-3 flex flex-wrap">
                             <div class="w-full px-3 sm:w-1/2">
                                 <div class="mb-5">
                                     <label for="bedrooms" class="mb-3 block text-base font-medium text-[#07074D]">
                                         Camas
                                     </label>
                                     <input type="number" placeholder="Cantidad Dormitorios"
                                         class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                         id="bedrooms" wire:model="bedrooms" />
                                     @error('bedrooms')
                                         <span>{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>
                             <div class="w-full px-3 sm:w-1/2">
                                 <div class="mb-5">
                                     <label for="bathrooms" class="mb-3 block text-base font-medium text-[#07074D]">
                                         Baños
                                     </label>
                                     <input type="number" placeholder="Cantidad de Baños"
                                         class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                         id="bathrooms" wire:model="bathrooms" />
                                     @error('bathrooms')
                                         <span>{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>
                         </div>

                         <div class="mb-5">
                             <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                 Dirección Propiedad
                             </label>
                             <input type="text" id="location" wire:model="location" placeholder="Location"
                                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                             @error('location')
                                 <span>{{ $message }}</span>
                             @enderror
                         </div>


                         <div class="-mx-3 flex flex-wrap">
                             <div class="w-full px-3 sm:w-1/2">
                                 <div class="mb-5">
                                     <label for="transaction_type"
                                         class="mb-3 block text-base font-medium text-[#07074D]">
                                         Total Area Por M²
                                     </label>
                                     <input type="number" placeholder="Total Area" id="total_area"
                                         wire:model="total_area"
                                         class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                     @error('total_area')
                                         <span>{{ $message }}</span>
                                     @enderror
                                 </div>

                             </div>
                             <div class="w-full px-3 sm:w-1/2">
                                 <div class="mb-5">
                                     <label for="propertyType"
                                         class="mb-3 block text-base font-medium text-[#07074D]">
                                         Estatus Anuncio
                                     </label>
                                     <select name="status" wire:model="status" id="status"
                                         class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                         <option value=""></option>
                                         <option value="active">Active</option>
                                         <option value="inactive">Inactive</option>
                                     </select>
                                     @error('status')
                                         <span>{{ $message }}</span>
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
                                 id="price" wire:model="price" />
                             @error('price')
                                 <span>{{ $message }}</span>
                             @enderror
                         </div>


                         <div class="mb-5">
                             <label for="propertyType" class="mb-3 block text-base font-medium text-[#07074D]">
                                 Características adicionales
                             </label>
                             <textarea name="additional_features" wire:model="additional_features" id="additional_features"
                                 placeholder="Cualquier característica adicional relevante, como piscina, jardín, garaje, etc... que desees informar a los visitantes"
                                 rows="5"
                                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                             @error('additional_features')
                                 <span>{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="mb-5">




                             <input type="file" id="images" wire:model="images" multiple />
                             @error('images')
                                 <span>{{ $message }}</span>
                             @enderror
                         </div>


                         <div>
                             <x-button class="mt-10" wire:loading.attr="disabled" wire:target="saveProperty,images">
                                 Publicar Anuncio</x-button>
                             <svg wire:loading wire:target="saveProperty"
                                 class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24">
                                 <circle class="opacity-25" cx="12" cy="12" r="10"
                                     stroke="currentColor" stroke-width="4"></circle>
                                 <path class="opacity-75" fill="currentColor"
                                     d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                 </path>
                             </svg>
                         </div>
                     </form>
                 </div>
             </div>


             <!--END PUBLISH PROPERTY-->

         </div>
     </div>
 </div>

 <script>
     const fileInput = document.getElementById("file-input");
     const dropZone = document.getElementById("drop-zone");
     const selectedImages = document.getElementById("selected-images");
     const selectButton = document.getElementById("select-button");
     const selectedFilesCount = document.getElementById(
         "selected-files-count"
     );

     selectButton.addEventListener("click", () => {
         fileInput.click();
     });

     fileInput.addEventListener("change", handleFiles);
     dropZone.addEventListener("dragover", handleDragOver);
     dropZone.addEventListener("dragleave", handleDragLeave);
     dropZone.addEventListener("drop", handleDrop);

     function handleFiles() {
         const fileList = this.files;
         displayImages(fileList);
     }

     function handleDragOver(event) {
         event.preventDefault();
         dropZone.classList.add("border-blue-500");
         dropZone.classList.add("text-blue-500");
     }

     function handleDragLeave(event) {
         event.preventDefault();
         dropZone.classList.remove("border-blue-500");
         dropZone.classList.remove("text-blue-500");
     }

     function handleDrop(event) {
         event.preventDefault();
         const fileList = event.dataTransfer.files;
         displayImages(fileList);
         dropZone.classList.remove("border-blue-500");
         dropZone.classList.remove("text-blue-500");
     }

     function displayImages(fileList) {
         selectedImages.innerHTML = "";
         for (const file of fileList) {
             const imageWrapper = document.createElement("div");
             imageWrapper.classList.add("relative", "mx-2", "mb-2");
             const image = document.createElement("img");
             image.src = URL.createObjectURL(file);
             image.classList.add("w-32", "h-32", "object-cover", "rounded-lg");
             const removeButton = document.createElement("button");
             removeButton.innerHTML = "&times;";
             removeButton.classList.add(
                 "absolute",
                 "top-1",
                 "right-1",
                 "h-6",
                 "w-6",
                 "bg-gray-700",
                 "text-white",
                 "text-xs",
                 "rounded-full",
                 "flex",
                 "items-center",
                 "justify-center",
                 "opacity-50",
                 "hover:opacity-100",
                 "transition-opacity",
                 "focus:outline-none"
             );

             removeButton.addEventListener("click", () => {
                 imageWrapper.remove();
                 updateSelectedFilesCount();
             });

             imageWrapper.appendChild(image);
             imageWrapper.appendChild(removeButton);
             selectedImages.appendChild(imageWrapper);
         }
         updateSelectedFilesCount();
     }

     function updateSelectedFilesCount() {
         const count = selectedImages.children.length;
         if (count > 0) {
             selectedFilesCount.textContent = `${count} file${
            count === 1 ? "" : "s"
          } selected`;
         } else {
             selectedFilesCount.textContent = "";
         }
     }
 </script>
