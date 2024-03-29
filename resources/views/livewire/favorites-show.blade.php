 <x-slot name="header">
     <x-slot name="title">
         {{ __('Mis Anuncios Favoritos') }}
     </x-slot>

 </x-slot>

 <div class="max-w-7xl mx-auto py-12">



     <div class="m-2 p-2 mb-5">
         <div class="mr-auto">
             <x-input2 id="name" type="text" class="block w-full md:w-5/12 lg:w-4/12" wire:model="search"
                 placeholder="Search..." autofocus autocomplete="off" />
         </div>
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
                             <th class="px-4 py-2"> Transacción Tipo</th>

                             <th class="px-4 py-2">Ver Anuncio</th>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200">
                             <tr></tr>
                             @forelse ($collections as $item)
                                 <tr>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>


                                     <td class="px-6 py-4 whitespace-nowrap">


                                         {{ Str::words($item->title, 5, '...') }}
                                     </td>

                                     <td class="px-6 py-4 whitespace-nowrap">{{ $item->publication_date }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $item->estatus_description }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $item->transaction_description }}</td>
                                     <td class="px-5 py-4 text-center text-sm">
                                         <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}"
                                             class="bg-indigo-700 transition duration-500 ease-in-out hover:bg-indigo-600 text-white font-bold  inline-flex items-center p-2 px-4 py-2 mr-0.5 rounded">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  inline-block "
                                                 viewBox="0 0 576 512" stroke="currentColor">
                                                 <path
                                                     d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                     fill="#ffffff" />
                                             </svg>

                                         </a>

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
                     <div class="m-2 p-2">{{ $collections->links() }}</div>
                 </div>
             </div>
         </div>

     </div>
     <div>


     </div>
 </div>
