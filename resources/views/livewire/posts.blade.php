 <x-slot name="header">
     <x-slot name="title">
         {{ __('Posts Manage') }}
     </x-slot>

 </x-slot>

 <div class="max-w-7xl mx-auto py-12">

     <!--INCLUDE ALERTS MESSAGES-->

     <x-message-success />


     <!-- END INCLUDE ALERTS MESSAGES-->

     <div class="m-2 p-2 mb-5 flex justify-between space-x-2">
         <x-button wire:click="showDataModal">+ Create New </x-button>

         <x-input2 id="name" type="text" class="block float-right w-full md:w-5/12 lg:w-4/12 " wire:model="search"
             placeholder="Search..." autofocus autocomplete="off" />
     </div>

     <div class="m-2 p-2">
         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
             <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <table class="w-full divide-y divide-gray-200 text-center">
                         <thead class="bg-green-600 text-white font-bold capitalize">
                             <th class="px-4 py-2 w-20">Id.</th>
                             <th class="px-4 py-2">Image</th>
                             <th class="px-4 py-2">Title</th>
                             <th class="px-4 py-2">Content</th>
                             <th class="px-4 py-2"></th>
                             <th class="px-4 py-2">Status</th>
                             <th class="px-4 py-2">Action</th>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200">
                             <tr></tr>
                             @forelse($posts as $post)
                                 <tr>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>

                                     <td class="px-6 py-4 whitespace-nowrap ">
                                         <div class="w-1/2 mx-auto">
                                             <img class="w-24 rounded border"
                                                 src="{{ Storage::url($post->post_image) }}" />
                                         </div>

                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                         {{ Str::words($post->post_title, 6, '...') }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                         {{ Str::words($post->post_content, 4, '...') }} </td>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $post->name }}</td>
                                     <td class="px-6 py-4 whitespace-nowrap">{{ $post->post_status }}</td>

                                     <td class="px-6 py-4 text-center text-sm">
                                         <a href="{{ route('showpost', ['postTitle' => $post->post_title_slug]) }}"
                                             class="bg-indigo-700 transition duration-500 ease-in-out hover:bg-indigo-600 text-white font-bold  inline-flex items-center p-2 px-4 py-2 mr-0.5 rounded">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  inline-block "
                                                 viewBox="0 0 576 512" stroke="currentColor">
                                                 <path
                                                     d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                     fill="#ffffff" />
                                             </svg>

                                         </a>
                                         <x-button wire:click="showEditDataModal({{ $post->id }})">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                             </svg>
                                         </x-button>

                                         <x-button-delete wire:click="$emit('deleteData',{{ $post->id }})">
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
                     <div class="m-2 p-2">{{ $posts->links() }}</div>
                 </div>
             </div>
         </div>

     </div>
     <div>
         <x-dialog-modal wire:model="showingDataModal">
             @if ($isEditMode)
                 <x-slot name="title">Update Post</x-slot>
             @else
                 <x-slot name="title">Create Post</x-slot>
             @endif
             <x-slot name="content">
                 <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                     <form enctype="multipart/form-data" autocomplete="off">
                         <div class="sm:col-span-6">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                             <div class="mt-1">
                                 <input type="text" id="post_title" wire:model.lazy="post_title" name="post_title"
                                     class="block w-full 
                                     appearance-none bg-white border
                                      border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 mb-2" />
                             </div>
                             @error('post_title')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="sm:col-span-6 ">

                             <label for="exampleFormControlInput2"
                                 class="block text-gray-700 text-sm font-bold mb-2">Image:</label>

                             @if ($oldImage)
                                 <div class="py-2">
                                     <label class="text-red-700
                                        font-bold">
                                         Current Image: </label>

                                     <img src="{{ Storage::url($oldImage) }}">
                                 </div>
                             @endif
                             @if ($newImage)
                                 <div class="py-2 ml-6">
                                     <label class="text-green-700 font-bold"> Photo Preview: </label>


                                     <img src="{{ $newImage->temporaryUrl() }}" class="w-32 h-32">
                                 </div>
                             @endif


                             <div class="mt-1">
                                 <input type="file" id="image" wire:model="newImage" name="newImage"
                                     class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                             </div>
                             @error('newImage')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror

                         </div>
                         <div class="sm:col-span-6 pt-5">
                             <label for="exampleFormControlInput2"
                                 class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                             <div class="mt-1">

                                 <textarea id="post_content" rows="3" wire:model.lazy="post_content" name="post_content"
                                     class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border
                                     py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                             </div>
                             @error('post_content')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="sm:col-span-6 py-2 ">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                             <div class="mt-1">

                                 <select data-te-select-init id="category_id" wire:model="category_id"
                                     name="category_id"
                                     class="block w-full 
                                     appearance-none bg-white border
                                      border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 mb-2">
                                     <option value=""></option>
                                     @foreach ($categories as $category)
                                         <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                     @endforeach

                                 </select>

                             </div>
                             @error('category_id')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="sm:col-span-6 mb-3">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                             <div class="mt-1">

                                 <select data-te-select-init id="post_status" wire:model="post_status"
                                     name="post_status"
                                     class="block w-full 
                                     appearance-none bg-white border
                                      border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 mb-2">
                                     <option value=""></option>
                                     <option value="ACTIVE">ACTIVE</option>
                                     <option value="INACTIVE">INACTIVE</option>


                                 </select>


                             </div>
                             @error('post_status')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>


                         <div class="sm:col-span-6">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Meta Title:</label>
                             <div class="mt-1">
                                 <input type="text" id="meta_title" wire:model.lazy="meta_title"
                                     class="block w-full 
                                     appearance-none bg-white border
                                      border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 mb-2" />
                             </div>
                             @error('meta_title')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="sm:col-span-6 pt-5">
                             <label for="exampleFormControlInput2"
                                 class="block text-gray-700 text-sm font-bold mb-2">Meta Description:</label>
                             <div class="mt-1">
                                 <textarea rows="3" wire:model.lazy="meta_description"
                                     class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border
                                     py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                             </div>
                             @error('meta_description')
                                 <span class="text-red-400">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="sm:col-span-6 pt-5">
                             <label for="exampleFormControlInput2"
                                 class="block text-gray-700 text-sm font-bold mb-2">Meta Keywords:</label>
                             <div class="mt-1">
                                 <textarea rows="3" wire:model.lazy="meta_keywords"
                                     class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border
                                     py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                             </div>
                             @error('meta_keywords')
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
                         wire:target="updateData,newImage">
                         <svg wire:loading wire:target="updateData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
                         wire:target="storeData,newImage">
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
