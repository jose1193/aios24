<!-- ABOUT -->


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
                        <a href="{{ route('about') }}"
                            class="ml-1 text-base  text-green-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Quienes Somos
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container my-30 mt-20 pb-5 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32">
        <style>
            @media (min-width: 992px) {
                #cta-img-nml-50 {
                    margin-left: 50px;
                }
            }
        </style>

        <div class="flex flex-wrap">
            <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
                <div class="flex lg:py-12">
                    <img src="{{ asset('img/about.jpg') }}" class="w-full rounded-lg shadow-lg" id="cta-img-nml-50"
                        style="z-index: 10" alt="" />
                </div>
            </div>

            <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                <div
                    class="bg-green-600 font-semibold h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
                    <div class="lg:pl-12">

                        <p class="mb-6 pb-2 lg:pb-0">

                            Aios Real Estate es una empresa dedicada al área de anuncios, ventas y alquiler de
                            propiedades en las Islas Canarias. Nuestro objetivo es ofrecer los mejores servicios a
                            nuestros clientes para garantizar la realización de sus proyectos inmobiliarios.
                        </p>



                        <p class="mb-6 pb-2 lg:pb-0">
                            Nuestro equipo está formado por profesionales altamente cualificados con un amplio
                            conocimiento del sector inmobiliario de las Islas Canarias. Contamos con una amplia
                            cartera de propiedades, lo que nos permite satisfacer las necesidades de nuestros
                            clientes.
                        </p>

                        <p class="mb-6 pb-2 lg:pb-0">

                            Aios Real Estate ofrece una amplia gama de servicios inmobiliarios, desde la búsqueda de
                            la propiedad ideal hasta la gestión de todos los trámites necesarios para la adquisición
                            de la misma. Nuestro equipo de profesionales está a disposición de nuestros clientes
                            para asesorarlos en todos los aspectos relacionados con la compra, venta o alquiler de
                            propiedades en las Islas Canarias.
                        </p>

                        <p class="mb-6 pb-2 lg:pb-0">
                            En Aios Real Estate somos conscientes de la importancia de la satisfacción de nuestros
                            clientes. Nos comprometemos a ofrecerles siempre un servicio de calidad, así como el
                            mejor asesoramiento tanto para la adquisición como para la gestión de sus propiedades.
                        </p>

                        <p class="mb-6 pb-2 lg:pb-0">

                            De esta manera, Aios Real Estate se ha convertido en el líder indiscutible en el sector
                            inmobiliario en las Islas Canarias. Si estás buscando una propiedad, no dudes en
                            contactarnos para que podamos ayudarte a encontrar la solución perfecta para tus
                            necesidades. ¡Estamos a tu disposición!

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</div>
<!-- END ABOUT -->
<!-- SUPPORT CONTACT - start -->
<div class="bg-white py-6 sm:py-8 lg:py-12 mb-5">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">
            <!-- image - start -->
            <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
                <img src="{{ asset('img/help-center.jpg') }}" loading="lazy" alt="about"
                    class="h-full w-full object-cover object-center" />
            </div>
            <!-- image - end -->

            <!-- content - start -->
            <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5 ">
                <h2 class="mb-4 text-xl font-bold text-green-800 md:text-2xl lg:text-4xl">Centro de Ayuda</h2>

                <p class="mb-8 max-w-md text-green-600">Si desea ponerse en contacto con nosotros, puede hacerlo a
                    través del formulario de contacto de nuestro sitio web. Estamos disponibles para responder
                    cualquier pregunta o inquietud que tenga.</p>

                <div class="mt-auto">
                    <x-a-button href="{{ route('contact') }}" class="">
                        <i class="fa-solid fa-chalkboard-user mr-2"></i>
                        Contacto
                    </x-a-button>

                </div>
            </div>
            <!-- content - end -->
        </div>
    </div>
</div>
<!-- SUPPORT CONTACT - end -->
