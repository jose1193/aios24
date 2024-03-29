 <x-slot name="header">
     <x-slot name="title">
         {{ __('Mis Publicaciones') }}
     </x-slot>

 </x-slot>

 <div class="max-w-7xl mx-auto py-12">

     <!--INCLUDE ALERTS MESSAGES-->

     <x-message-success />


     <!-- END INCLUDE ALERTS MESSAGES-->


     <div class="m-2 p-2 mb-5 flex justify-between space-x-2">
         @can('manage admin')
             <x-a-button href="{{ route('publish') }}">Publicar</x-a-button>
         @endcan
         <x-input2 id="name" type="text" class="block float-right w-full md:w-5/12 lg:w-4/12" wire:model="search"
             placeholder="Búsqueda por Título..." autofocus autocomplete="off" />
     </div>


     <div class="m-2 p-2">
         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
             <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <table class="w-full divide-y divide-gray-200 text-center">
                         <thead class="bg-green-600 text-white font-bold capitalize">
                             <th class="px-4 py-2 w-20">Id.</th>

                             <th class="px-4 py-2">Título</th>

                             <th class="px-4 py-2">Fecha de Publicación</th>
                             <th class="px-4 py-2">Status</th>
                             <th class="px-4 py-2">Plan</th>

                             <th class="px-4 py-2">Action</th>
                             <th class="px-4 py-2">
                                 @if (!$properties->isEmpty())
                                     <button id="deleteSelectedData"
                                         class="px-4 py-2 bg-red-600 text-xs text-white rounded"
                                         onclick="deleteSelectedData()"> <i class="fa-solid fa-trash-can mr-1"></i>
                                         Eliminar</button>
                                 @endif



                             </th>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200">
                             <tr></tr>
                             @forelse ($properties as $property)
                                 <tr>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>


                                     <td class="px-6 py-4 whitespace-nowrap">


                                         {{ Str::words($property->title, 5, '...') }}
                                     </td>

                                     <td class="px-6 py-4 whitespace-nowrap">{{ $property->publication_date }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $property->estatus_description }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                         @if ($property->plan == 'Free')
                                             <span
                                                 class="bg-green-600 text-white font-semibold  px-2 py-1 rounded">Free</span>
                                         @elseif ($property->plan == 'Oro')
                                             <span
                                                 class="bg-gradient-to-r from-yellow-400 to-yellow-500 font-semibold text-white px-2 py-1 rounded">Oro</span>
                                         @elseif ($property->plan == 'Platino')
                                             <span
                                                 class="bg-gradient-to-r from-gray-400 to-gray-600 font-semibold text-white px-2 py-1 rounded">Platino</span>
                                         @endif
                                     </td>

                                     <td class="px-5 py-4 text-center text-sm">


                                         <a href="{{ route('views', ['publishCode' => $property->publish_code]) }}"
                                             class="bg-indigo-700 transition duration-500 ease-in-out hover:bg-indigo-600 text-white font-bold  inline-flex items-center p-2 px-4 py-2 mr-0.5 rounded">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  inline-block "
                                                 viewBox="0 0 576 512" stroke="currentColor">
                                                 <path
                                                     d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                     fill="#ffffff" />
                                             </svg>

                                         </a>





                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap">

                                         <label for="checkbox_{{ $property->id }}" class=" checkbox-container">
                                             <input type="checkbox" id="checkbox_{{ $property->id }}"
                                                 class="hidden checkbox-data" data-id="{{ $property->id }}">
                                             <span class="checkmark"></span>
                                         </label>




                                     </td>
                                 </tr>
                             @empty
                                 <tr class="text-center">
                                     <td colspan="7">
                                         <div class="grid justify-items-center w-full mt-5">
                                             <div class="text-center bg-red-100 rounded-lg py-5 w-full px-6 mb-4 text-base text-red-700 "
                                                 role="alert">
                                                 No Data Records
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                     <div class="m-2 p-2">{{ $properties->links() }}</div>
                 </div>
             </div>
         </div>

     </div>
     <div>

     </div>
 </div>


 <style>
     /* Estilos básicos para el checkbox */

     .checkbox-container {
         display: block;
         /* Ajustamos el display a "block" para que el checkbox ocupe toda la celda */
         position: relative;
         cursor: pointer;
         width: 20px;
         height: 20px;
         margin: auto;
         /* Centramos verticalmente */
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
     #deleteSelectedData {
         display: block;
     }
 </style>
 @push('js')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         function deleteSelectedData() {

             const selectedDataIds = Array.from(document.querySelectorAll('.checkbox-data:checked'))
                 .map(checkbox => checkbox.getAttribute('data-id'));

             if (selectedDataIds.length === 0) {
                 Swal.fire('¡Error!', 'Por favor, seleccione al menos un anuncio para eliminar.', 'error');
                 return;
             }

             Swal.fire({
                 title: 'Eliminar Anuncios',
                 text: '¿Estás seguro de que quieres eliminar los anuncios seleccionados?',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Eliminar',
                 cancelButtonText: 'Cancelar'
             }).then((result) => {
                 if (result.isConfirmed) {
                     // Realiza una solicitud AJAX para eliminar las imágenes seleccionadas
                     axios.post('/delete-properties', {
                             dataIds: selectedDataIds
                         })
                         .then((response) => {
                             if (response.data.success) {
                                 Swal.fire('Éxito', 'Los anuncios han sido eliminados exitosamente', 'success')
                                     .then(() => {

                                         const deleteButton = document.getElementById(
                                             'deleteSelectedData');
                                         deleteButton.style.display =
                                             'block'; // Oculta el botón "Eliminar" después de confirmar

                                         window.location.href = '/published/';
                                     });
                             } else {
                                 Swal.fire('¡Error!', 'Ha ocurrido un problema al eliminar los anuncios.',
                                     'error');
                             }
                         })
                         .catch((error) => {
                             console.error(error);
                             Swal.fire('¡Error!', 'Ha ocurrido un problema al eliminar los anuncios.', 'error');
                         });
                 }
             });
         }

         const deleteButton = document.getElementById('deleteSelectedData');
         const checkboxes = document.querySelectorAll('input[type="checkbox"]');

         checkboxes.forEach(checkbox => {
             checkbox.addEventListener('change', () => {
                 const anyCheckboxChecked = Array.from(checkboxes).some(cb => cb.checked);
                 deleteButton.style.display = anyCheckboxChecked ? 'block' : 'block';
                 if (checkbox.checked) {
                     const dataId = checkbox.getAttribute('data-id');
                     console.log('ID marcado:', dataId);
                 }
             });
         });

         deleteButton.addEventListener('click', deleteSelectedData);
     </script>

     <script>
         Livewire.on('deleteData', catId => {
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
                     Livewire.emitTo('posts', 'delete', catId)
                     Swal.fire(
                         'Deleted!',
                         'Your Data has been deleted.',
                         'success'
                     )
                 }
             })
         })
     </script>
 @endpush
