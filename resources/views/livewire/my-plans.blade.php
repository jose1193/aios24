 <x-slot name="header">
     <x-slot name="title">
         {{ __('Resumen Planes Premiun ') }}
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
                 <a href="{{ route('myplans') }}" :active="request() - > routeIs('myplans')"
                     class="text-gray-600 hover:text-green-500">
                     {{ __('Mis Planes Premiun') }}
                 </a>


             </li>


         </ul>
     </div>

 </x-slot>

 <div class="max-w-7xl mx-auto py-12">

     <!--INCLUDE ALERTS MESSAGES-->

     <x-message-success />


     <!-- END INCLUDE ALERTS MESSAGES-->




     <div class="m-2 p-2">
         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
             <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 capitalize">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <table class="w-full divide-y divide-gray-200 text-center">
                         <thead class="bg-green-600 text-white font-bold capitalize">
                             <th class="px-4 py-2 w-20">Nro.</th>
                             <th class="px-4 py-2">Título</th>
                             <th class="px-4 py-2">Plan</th>
                             <th class="px-4 py-2">Código Public.</th>

                             <th class="px-4 py-2">Date</th>
                             <th class="px-4 py-2">Expiration Date</th>
                             <th class="px-4 py-2">Estatus</th>
                             <th class="px-4 py-2">Action</th>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200">
                             <tr></tr>
                             @forelse($myplans as $item)
                                 <tr>
                                     <td class=" px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         <button
                                             class="bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-500 text-white font-bold py-2 px-4 rounded">
                                             {{ $item->plan }} </button>
                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         {{ Str::words($item->title, 6, '...') }}

                                     </td>

                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         {{ $item->publish_code }}

                                     </td>

                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         {{ $item->date_myplan }}

                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         {{ $item->expiration_date }}

                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         {{ $item->myplan_status }}

                                     </td>
                                     <td>
                                         <x-button wire:click="showEditDataModal({{ $item->id }})">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                             </svg>
                                         </x-button>

                                         <x-button-delete wire:click="$emit('deleteData',{{ $item->id }})">
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
                     <div class="m-2 p-2">{{ $myplans->links() }}</div>
                 </div>
             </div>
         </div>

     </div>

 </div>
