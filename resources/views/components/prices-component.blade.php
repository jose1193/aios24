<!-- PRICES -->
<div class="flex justify-center -mt-10">
    <div class="bg-white p-4 flex items-center flex-wrap font-bold">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/"
                        class="inline-flex items-center text-base font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('prices') }}"
                            class="ml-1 text-base  text-green-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Precios
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Container for demo purpose -->
<div class="container my-20 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32 pb-20 text-gray-800">
        <div class="block rounded-lg shadow-lg bg-white">

            <div class=" w-full ">
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                    <div class="mx-auto max-w-screen-xl px-4 md:px-8">


                        <div class="mb-6 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 lg:gap-8">
                            <!-- plan - start -->
                            <div class="flex flex-col overflow-hidden rounded-lg border sm:mt-8">
                                <div class="h-2 bg-pink-500"></div>

                                <div class="flex flex-1 flex-col p-6 pt-8">
                                    <div class="mb-12">
                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">Free </div>

                                        <p class="mb-8 px-8 text-center text-gray-500"> Visibilidad Estándar para la
                                            publicación de anuncios. Tus anuncios se mostrarán a un amplio público en
                                            línea
                                        </p>

                                        <div class="space-y-4">


                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Exposición Estandar</span>
                                            </div>
                                            <!-- check - end -->
                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Duración de Publicación 60 días</span>
                                            </div>
                                            <!-- check - end -->

                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Máximo 10 Publicaciones</span>
                                            </div>
                                            <!-- check - end -->


                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="#"
                                            class="block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">$0
                                            / Free</a>
                                    </div>
                                </div>
                            </div>
                            <!-- plan - end -->

                            <!-- plan - start -->
                            <div class="flex flex-col overflow-hidden rounded-lg border-2 border-indigo-500">
                                <div
                                    class="bg-indigo-500 py-2 text-center text-sm font-semibold uppercase tracking-widest text-white">
                                    Popular choise</div>

                                <div class="flex flex-1 flex-col p-6 pt-8">
                                    <div class="mb-12">
                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">Oro</div>

                                        <p class="mx-auto mb-8 px-8 text-center text-gray-500">Visibilidad Destacada
                                            para
                                            la publicación de anuncios. Tus anuncios estarán
                                            ubicados en
                                            una posición media en la página de resultados de búsqueda.</p>

                                        <div class="space-y-4">
                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Exposición Destacada</span>
                                            </div>
                                            <!-- check - end -->
                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Duración de Publicación 120 días</span>
                                            </div>
                                            <!-- check - end -->

                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Publicaciones Ilimitadas</span>
                                            </div>
                                            <!-- check - end -->
                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="#"
                                            class="block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">$19</a>
                                    </div>
                                </div>
                            </div>
                            <!-- plan - end -->

                            <!-- plan - start -->
                            <div class="flex flex-col overflow-hidden rounded-lg border lg:mt-8">
                                <div class="h-2 bg-gray-800"></div>

                                <div class="flex flex-1 flex-col p-6 pt-8">
                                    <div class="mb-12">
                                        <div class="mb-2 text-center text-2xl font-bold text-gray-800">Platino</div>

                                        <p class="mx-auto mb-8 px-8 text-center text-gray-500">Visibilidad Máxima
                                            para
                                            la publicación de anuncios. Tus anuncios estarán
                                            ubicados en
                                            primeros lugares en la página de resultados de búsqueda.</p>

                                        <div class="space-y-4">
                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Exposición Máxima Primeros Lugares</span>
                                            </div>
                                            <!-- check - end -->
                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Duración de Publicación 180 días</span>
                                            </div>
                                            <!-- check - end -->

                                            <!-- check - start -->
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 shrink-0 text-indigo-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                                <span class="text-gray-600">Publicaciones Ilimitadas</span>
                                            </div>
                                            <!-- check - end -->
                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="#"
                                            class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">$29</a>
                                    </div>
                                </div>
                            </div>
                            <!-- plan - end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
<!-- END PRICES -->
