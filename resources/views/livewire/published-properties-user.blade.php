 <x-slot name="header">
     <x-slot name="title">
         {{ __('Mis Publicaciones') }}
     </x-slot>

 </x-slot>

 <div class="max-w-7xl mx-auto py-12">

     <!--INCLUDE ALERTS MESSAGES-->

     <x-message-success />


     <!-- END INCLUDE ALERTS MESSAGES-->

     <div class="m-2 p-2 mb-5">
         <x-a-button href="{{ route('publish') }}">+ Publicar</x-a-button>


         <x-input2 id="name" type="text" class="block float-right w-full md:w-5/12 lg:w-4/12 " wire:model="search"
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

                             <th class="px-4 py-2">Fecha de Publiación</th>
                             <th class="px-4 py-2">Status</th>
                             <th class="px-4 py-2">Exposición Premiun</th>
                             <th class="px-4 py-2">Action</th>
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

                                         <a href="{{ route('choose-plan', ['publishCode' => $property->publish_code]) }}"
                                             class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-500 text-white font-bold py-2 px-4 rounded">
                                             Destacar
                                         </a>


                                     </td>
                                     <td class="px-6 py-4 text-center text-sm">

                                         <x-button>
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                             </svg>
                                         </x-button>

                                         <x-button-delete wire:click="$emit('deleteData',{{ $property->id }})">
                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-5 h-5 text-white  inline-block" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                             </svg>
                                         </x-button-delete>

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


 @push('js')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
