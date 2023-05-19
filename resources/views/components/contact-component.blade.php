<!-- component -->
<div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                        ¡Ponte en contacto!
                    </h1>
                    <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                        Completa el siguiente formulario para iniciar una conversación.
                    </p>


                    <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-80">
                            @foreach ($buckets as $bucket)
                                {{ $bucket->description }}, {{ $bucket->city }}, {{ $bucket->community }},
                                {{ $bucket->country }}
                            @endforeach
                        </div>
                    </div>



                    <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                            {{ $emailAdmin }}
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="sendEmail" class="p-6 flex flex-col justify-center">
                    <div class="flex flex-col">
                        <label for="name" class="hidden">Nombre</label>
                        <input type="text" wire:model="name" name="name" required id="name"
                            placeholder="Tu Nombre"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="email" class="hidden">Email</label>
                        <input type="email" wire:model="email" name="email" required id="email"
                            placeholder="Tu Email"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col mt-2">
                        <label for="tel" class="hidden">Asunto</label>
                        <input type="text" wire:model="subject" name="subject" required id="subject"
                            placeholder="Asunto"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="tel" class="hidden">Mensaje</label>
                        <textarea tabindex="0" wire:model="messageform" required id="messageform" aria-label="leave a message" role="textbox"
                            type="name" placeholder="Mensaje"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none"></textarea>
                    </div>

                    <x-button2 class="mt-10">
                        Enviar
                    </x-button2>
                </form>
            </div>
        </div>
    </div>
</div>
