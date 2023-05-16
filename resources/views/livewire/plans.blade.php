<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-green-600">Gestión de Planes </h2>
</x-slot>
<div class="py-12 mb-20">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <!--INCLUDE ALERTS MESSAGES-->

            <x-message-success />


            <!-- END INCLUDE ALERTS MESSAGES-->
            @can('manage plans')
                <x-button3 wire:click="create()" class="mb-5">+ Registrar Plan </x-button3>
            @endcan
            @if ($isModalOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full text-center">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Plan</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Posición</th>
                        <th class="px-4 py-2">Cantidad P.</th>
                        <th class="px-4 py-2">Duración</th>

                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plans as $plan)
                        <tr>
                            <td class="border px-4 py-2 ">{{ $plan->id }}</td>
                            <td class="border px-4 py-2 ">{{ $plan->plan }}</td>
                            <td class="border px-4 py-2">{{ $plan->pricing }}</td>
                            <td class="border px-4 py-2">{{ $plan->position }}</td>
                            <td class="border px-4 py-2">{{ $plan->quantity }}</td>
                            <td class="border px-4 py-2">{{ $plan->duration }}</td>
                            <td class="border px-4 py-2 text-center ">



                                <x-button3 wire:click="edit({{ $plan->id }})"> <svg
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></x-button3>
                                <x-button-delete wire:click="$emit('deleteData',{{ $plan->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white  inline-block"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-button-delete>

                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="7"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ __('No Plans found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
                    Livewire.emitTo('plans', 'delete', catId)
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
