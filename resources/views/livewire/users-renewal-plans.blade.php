<x-slot name="header">
    <x-slot name="title">
        {{ __('Resumen Planes Renovaciones Usuarios') }}
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
                <a href="{{ route('my-renewals-plans') }}" :active="request() - > routeIs('myplans')"
                    class="text-gray-600 hover:text-green-500">
                    {{ __('Resumen Renovaciones Planes Premiun ') }}
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

                            <th class="px-4 py-2">Nro</th>
                            <th class="px-4 py-2">Usuario</th>
                            <th class="px-4 py-2">Plan</th>


                            <th class="px-4 py-2">Fecha de Renovación</th>
                            <th class="px-4 py-2">Nro Factura</th>



                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            @forelse($myplans as $item)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        {{ $item->name }} {{ $item->lastname }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">

                                        @if ($item->id == '1')
                                            <span
                                                class="bg-green-600 text-white font-semibold  px-2 py-1 rounded">{{ $item->plan }}</span>
                                        @elseif ($item->id == '2')
                                            <span
                                                class="bg-gradient-to-r from-yellow-400 to-yellow-500 font-semibold text-white px-2 py-1 rounded">{{ $item->plan }}</span>
                                        @elseif ($item->id == '3')
                                            <span
                                                class="bg-gradient-to-r from-gray-400 to-gray-600 font-semibold text-white px-2 py-1 rounded">{{ $item->plan }}</span>
                                        @endif


                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap font-semibold">
                                        {{ $item->purchase_date }}

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap font-semibold">
                                        {{ $item->nro_invoices }}

                                    </td>


                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">
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
