 <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
     <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
         <div class="fixed inset-0 transition-opacity">
             <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
         </div>
         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
             <form>
                 <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                     <div class="">
                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Plan</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Plan" wire:model="plan">
                             @error('plan')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                             <textarea
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Plan" wire:model="plan_description"></textarea>
                             @error('plan')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror

                         </div>
                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Precio" wire:model="pricing">
                             @error('pricing')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Posición</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Posición" wire:model="position">
                             @error('position')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Cantidad P.</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Cantidad de Publicaciones"
                                 wire:model="quantity">
                             @error('quantity')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Imagenes Cantidad.</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Cantidad de Publicaciones"
                                 wire:model="images_quantity">
                             @error('images_quantity')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>

                         <div class="mb-4">
                             <label for="exampleFormControlInput1"
                                 class="block text-gray-700 text-sm font-bold mb-2">Duración Dias</label>
                             <input type="text"
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                 id="exampleFormControlInput1" placeholder="Ingrese Duración" wire:model="duration">
                             @error('duration')
                                 <span class="text-red-500">{{ $message }}</span>
                             @enderror
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                     <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                         <x-button3 wire:click.prevent="store()">
                             Registrar
                         </x-button3>
                     </span>
                     <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                         <button wire:click="closeModalPopover()" type="button"
                             class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                             Close
                         </button>
                     </span>
                 </div>
             </form>
         </div>
     </div>
 </div>
