    <x-slot name="header">
        <x-slot name="title">
            {{ __('Transactions Manager') }}
        </x-slot>

    </x-slot>

    <div class="max-w-7xl mx-auto py-12">

        <!--INCLUDE ALERTS MESSAGES-->

        <x-message-success />


        <!-- END INCLUDE ALERTS MESSAGES-->




        <div class="m-2 p-2 mb-5">
            <x-button wire:click="showDataModal" class="mb-5">+ Create New </x-button>

            <x-input2 id="name" type="text" class="block float-right w-full md:w-5/12 lg:w-4/12 "
                wire:model="search" placeholder="Search..." autofocus autocomplete="off" />
        </div>

        <div class="m-2 p-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 capitalize">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-green-600 text-white font-bold capitalize">
                                <th class="px-4 py-2 w-20">Nro</th>
                                <th class="px-4 py-2">Description</th>

                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Action</th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr></tr>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap ">
                                            {{ $transaction->description }}

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap ">
                                            {{ $transaction->created_at }}

                                        </td>
                                        <td>
                                            <x-button wire:click="showEditDataModal({{ $transaction->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </x-button>

                                            <x-button-delete wire:click="$emit('deleteData',{{ $transaction->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 text-white  inline-block" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </x-button-delete>

                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">
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
                        <div class="m-2 p-2">{{ $transactions->links() }}</div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <x-dialog-modal wire:model="showingDataModal">
                @if ($isEditMode)
                    <x-slot name="title">Update Data</x-slot>
                @else
                    <x-slot name="title">Create Data</x-slot>
                @endif
                <x-slot name="content">
                    <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                        <form enctype="multipart/form-data" autocomplete="off">
                            <div class="sm:col-span-6">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                <div class="mt-1">
                                    <input type="text" id="description" wire:model.lazy="description"
                                        name="description"
                                        class="block w-full 
                                     appearance-none bg-white border
                                      border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 mb-2" />
                                </div>
                                @error('name')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>


                        </form>
                    </div>

                </x-slot>
                <x-slot name="footer">
                    @if ($isEditMode)
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center  rounded-md border border-gray-300 px-4 py-2 mr-3
                         bg-white text-base leading-6 font-medium
                          text-gray-700 shadow-sm hover:text-gray-500 
                          focus:outline-none focus:border-blue-300
                           focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                        <x-button wire:click.prevent="updateData()" wire:loading.attr="disabled"
                            wire:target="updateData">
                            <svg wire:loading wire:target="updateData"
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Update
                        </x-button>
                    @else
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center  rounded-md border border-gray-300 px-4 py-2 mr-3
                         bg-white text-base leading-6 font-medium
                          text-gray-700 shadow-sm hover:text-gray-500 
                          focus:outline-none focus:border-blue-300
                           focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                        <x-button wire:click.prevent="storeData()" wire:loading.attr="disabled"
                            wire:target="storeData,password">
                            <svg wire:loading wire:target="storeData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            {{ __('Save') }}
                        </x-button>
                    @endif
                </x-slot>
            </x-dialog-modal>
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
                        Livewire.emitTo('transactions', 'delete', catId)
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
