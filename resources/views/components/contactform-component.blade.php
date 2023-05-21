<!-- component -->
<!--INCLUDE ALERTS MESSAGES-->

<x-message-success />


<!-- END INCLUDE ALERTS MESSAGES-->
<div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                        ¡Ponte en Contacto!
                    </h1>
                    <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                        Completa el siguiente formulario para iniciar una conversación.
                    </p>


                    <livewire:bucket-component />




                </div>

                <form action="{{ route('contact.store') }}" method="POST" autocomplete="off"
                    class="p-6 flex flex-col justify-center">
                    @csrf

                    <div class="flex flex-col">
                        <label for="name" class="hidden">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            id="name" placeholder="Tu Nombre"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="email" class="hidden">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required id="email"
                            placeholder="Tu Email"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col mt-2">
                        <label for="tel" class="hidden">Asunto</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required id="subject"
                            placeholder="Asunto"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="tel" class="hidden">Mensaje</label>
                        <textarea tabindex="0" name="messageform" required id="messageform" aria-label="leave a message" role="textbox"
                            type="name" placeholder="Mensaje" id="messageform"
                            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">{{ old('messageform') }}</textarea>
                    </div>

                    <x-button2 class="mt-10">
                        Enviar
                    </x-button2>
                </form>
            </div>
        </div>
    </div>
</div>
